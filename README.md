# DocGen - Laravel Documentation Viewer
[![Latest Version on Packagist](https://img.shields.io/packagist/v/smmahfujurrahman/docgen.svg?style=flat-square)](https://packagist.org/packages/smmahfujurrahman/docgen)
[![Total Downloads](https://img.shields.io/packagist/dt/smmahfujurrahman/docgen.svg?style=flat-square)](https://packagist.org/packages/smmahfujurrahman/docgen)

A beautiful Laravel package for viewing Markdown documentation with GitHub-style rendering, search functionality, and zero configuration.

## ✨ Features

- 📖 **Beautiful GitHub-Style Rendering** - Professional documentation view
- 🔍 **Real-time Search** - Find docs instantly with Ctrl+K
- 🎨 **Syntax Highlighting** - Code blocks with Highlight.js
- 📱 **Responsive Design** - Works on all devices
- 🔒 **Secure** - Protection against directory traversal
- 📋 **Copy Code Buttons** - One-click code copying
- ⚡ **Zero Configuration** - Works out of the box
- 🗂️ **Folder Organization** - Automatic categorization
- 🎯 **SEO Friendly** - Proper heading structure

## 📋 Requirements

- PHP 8.1 or higher
- Laravel 10.x or ^11.x
- Composer

## 🚀 Installation

Install the package via Composer:

```bash
composer require smmahfujurrahman/docgen
```

The package will automatically register its service provider.

## 📦 Publishing Assets

Publish all assets at once:

```bash
php artisan vendor:publish --tag=docgen
```

Or publish specific assets:

```bash
# Publish configuration
php artisan vendor:publish --tag=docgen-config

# Publish routes
php artisan vendor:publish --tag=docgen-routes

# Publish views
php artisan vendor:publish --tag=docgen-views

# Publish dummy documentation
php artisan vendor:publish --tag=docgen-docs
```

## 🎯 Usage

### Quick Start

1. **Install the package** (see above)

2. **Publish the assets**:
   ```bash
   php artisan vendor:publish --tag=docgen
   ```

3. **Access your documentation**:
   ```
   http://your-app.test/documentation
   ```

That's it! You'll see the welcome page with dummy documentation.

### Adding Your Documentation

1. Navigate to the `docs` folder in your Laravel project root
2. Add your `.md` (Markdown) files
3. Refresh the documentation page

**Example structure:**

```
docs/
├── README.md
├── installation.md
├── api/
│   ├── authentication.md
│   └── endpoints.md
└── guides/
    ├── getting-started.md
    └── deployment.md
```

### Linking Routes in Your App

After publishing, update your `routes/web.php` to include the documentation routes:

```php
// At the end of routes/web.php
if (file_exists(base_path('routes/docs.php'))) {
    require base_path('routes/docs.php');
}
```

Or if you want to customize, you can manually define routes using the config:

```php
Route::get('/docs', function () {
    // Your custom implementation
});
```

## ⚙️ Configuration

The configuration file will be published to `config/docgen.php`:

```php
return [
    // Route prefix for documentation (default: 'documentation')
    'route_prefix' => env('DOCGEN_ROUTE_PREFIX', 'documentation'),
    
    // Directory where markdown files are stored (default: 'docs')
    'docs_path' => env('DOCGEN_DOCS_PATH', 'docs'),
    
    // Auto-register routes (default: true)
    'auto_register_routes' => env('DOCGEN_AUTO_ROUTES', true),
    
    // CommonMark configuration
    'commonmark' => [
        'html_input' => 'allow',
        'allow_unsafe_links' => false,
    ],
];
```

### Environment Variables

Add these to your `.env` file to customize:

```env
DOCGEN_ROUTE_PREFIX=documentation
DOCGEN_DOCS_PATH=docs
DOCGEN_AUTO_ROUTES=true
```

## 🎨 Customization

### Customizing Views

Publish the views and modify them:

```bash
php artisan vendor:publish --tag=docgen-views
```

Views will be copied to `resources/views/documentations/`:
- `docs-index.blade.php` - Documentation index page
- `docs-viewer.blade.php` - Individual document viewer

### Customizing Styles

Edit the published views to change colors, fonts, or layout. The views use inline CSS for easy customization.

### Custom Routes

If you want full control over routes, set `auto_register_routes` to `false` in config and define your own routes:

```php
use League\CommonMark\CommonMarkConverter;

Route::get('/my-docs', function () {
    // Your custom documentation logic
});
```

## 🔒 Security Features

DocGen includes built-in security:

1. **File Type Validation**: Only `.md` files are accessible
2. **Directory Traversal Protection**: Prevents `../` attacks
3. **Path Validation**: Uses `realpath()` for secure path resolution
4. **Configurable Paths**: Restrict docs to specific directories

## 📖 Markdown Support

DocGen supports full Markdown syntax:

### Basic Formatting

```markdown
# Heading 1
## Heading 2
### Heading 3

**Bold Text**
*Italic Text*
~~Strikethrough~~

[Link](https://example.com)
![Image](image.jpg)
```

### Code Blocks

```markdown
```php
<?php
echo "Hello, World!";
``` 
```

### Tables

```markdown
| Column 1 | Column 2 |
|----------|----------|
| Data 1   | Data 2   |
```

### Lists

```markdown
- Unordered item
- Another item

1. Ordered item
2. Another item
```

### Blockquotes

```markdown
> This is a blockquote
```

## 🎯 Features in Detail

### Search Functionality

- Real-time search as you type
- Searches both filenames and content titles
- Keyboard shortcut: `Ctrl+K` (Windows/Linux) or `Cmd+K` (Mac)
- Press `Escape` to clear search

### Syntax Highlighting

Powered by Highlight.js with support for:
- PHP, JavaScript, Python, Ruby, Java, C++, and more
- Auto-detection of languages
- GitHub color scheme

### Copy Code Buttons

- Appears on hover over code blocks
- One-click copying to clipboard
- Visual feedback on successful copy

### Responsive Design

- Mobile-first approach
- Tablet-optimized layouts
- Desktop full-feature experience

## 🛠️ Development

### Local Package Development

To test the package locally before publishing:

1. Add to your Laravel app's `composer.json`:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "./packages/smmahfujurrahman/docgen"
        }
    ]
}
```

2. Require the package:

```bash
composer require smmahfujurrahman/docgen:@dev
```

### Running Tests

```bash
composer test
```

## 📝 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

The MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.

## 👤 Author

**S. M. Mahfujur Rahman**

- GitHub: [@MahfujuRahman](https://github.com/MahfujuRahman)
- Email: mahfujur.dev@gmail.com

## 🙏 Credits

- Built with [Laravel](https://laravel.com)
- Markdown parsing by [CommonMark](https://commonmark.thephpleague.com/)
- Syntax highlighting by [Highlight.js](https://highlightjs.org/)
- Icons by [Font Awesome](https://fontawesome.com/)
- Styling inspired by [GitHub](https://github.com)

## 💡 Support

If you find this package helpful, please consider:

- ⭐ Starring the repository
- 🐛 Reporting bugs
- 💡 Suggesting new features
- 📝 Improving documentation

---

Made with ❤️ by S. M. Mahfujur Rahman
