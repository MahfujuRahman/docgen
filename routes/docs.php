<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Documentation Routes
|--------------------------------------------------------------------------
|
| This file contains routes for the DocGen package.
| These routes provide access to view Markdown documentation files.
|
*/

$routePrefix = config('docgen.route_prefix', 'documentation');
$docsPath = config('docgen.docs_path', 'docs');

// Documentation Index - List all documentation files
Route::get($routePrefix, function () use ($docsPath) {
    $fullDocsPath = base_path($docsPath);

    if (!is_dir($fullDocsPath)) {
        abort(404, 'Documentation directory not found');
    }

    // Get all .md files recursively
    $files = [];
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($fullDocsPath, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'md') {
            $relativePath = str_replace($fullDocsPath . DIRECTORY_SEPARATOR, '', $file->getPathname());
            $relativePath = str_replace(DIRECTORY_SEPARATOR, '/', $relativePath); // Normalize path separators

            // Read first line or first heading for title
            $content = file_get_contents($file->getPathname());
            preg_match('/^#\s+(.+)$/m', $content, $matches);
            $title = $matches[1] ?? basename($file->getFilename(), '.md');

            // Get file size
            $size = $file->getSize();
            $sizeFormatted = $size < 1024 ? $size . ' B' :
                            ($size < 1048576 ? round($size / 1024, 2) . ' KB' :
                            round($size / 1048576, 2) . ' MB');

            // Categorize by directory
            $parts = explode('/', $relativePath);
            $category = count($parts) > 1 ? dirname($relativePath) : 'Root';

            $files[] = [
                'path' => $relativePath,
                'title' => $title,
                'filename' => $file->getFilename(),
                'size' => $sizeFormatted,
                'modified' => date('M j, Y H:i', $file->getMTime()),
                'category' => $category,
            ];
        }
    }

    // Sort files by category, then by filename
    usort($files, function($a, $b) {
        $catCompare = strcmp($a['category'], $b['category']);
        return $catCompare !== 0 ? $catCompare : strcmp($a['filename'], $b['filename']);
    });

    return view('docgen::docs-index', [
        'files' => $files,
        'totalFiles' => count($files)
    ]);
})->name('documentation.index');

// Documentation Viewer - Dynamic route for viewing Markdown files
Route::get($routePrefix . '/{file}', function ($file) use ($docsPath) {

    // --- Security 1: Ensure we are only serving .md files ---
    if (!str_ends_with($file, '.md')) {
        abort(404, 'Only .md files are allowed.');
    }

    // --- Security 2: Prevent directory traversal (e.g., ../.env) ---
    // Get the full, absolute path of the 'docs' directory
    $baseDocsPath = realpath(base_path($docsPath));

    // Get the full, absolute path of the requested file
    $requestedPath = realpath(base_path($docsPath . '/' . $file));

    // Check if the requested path is valid AND is still inside the $baseDocsPath
    if ($requestedPath === false || !str_starts_with($requestedPath, $baseDocsPath)) {
        abort(403, 'Forbidden - Invalid file path');
    }

    // --- File Reading and Conversion ---

    // Read the file's content
    $markdownContent = file_get_contents($requestedPath);

    // Initialize the converter (league/commonmark)
    $commonmarkConfig = config('docgen.commonmark', [
        'html_input' => 'allow',
        'allow_unsafe_links' => false,
    ]);

    $converter = new \League\CommonMark\CommonMarkConverter($commonmarkConfig);

    // Convert the Markdown to HTML
    $htmlContent = $converter->convert($markdownContent);

    // Return the view, passing in the HTML and a title
    return view('docgen::docs-viewer', [
        'content' => $htmlContent,
        'title' => 'Documentation: ' . basename($file, '.md')
    ]);

})->where('file', '.*')->name('documentation.viewer'); // Allows slashes in file parameter
