<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Documentation Index</title>

    <!-- GitHub Markdown CSS for consistency -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.5.1/github-markdown-light.min.css">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Noto Sans', Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .header p {
            font-size: 18px;
            opacity: 0.95;
            margin-bottom: 10px;
        }

        .stats {
            display: inline-flex;
            gap: 30px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 15px 30px;
            border-radius: 50px;
            margin-top: 10px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stat-item i {
            font-size: 20px;
        }

        .search-box {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .search-input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e1e4e8;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-wrapper {
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 18px;
        }

        .docs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .doc-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .doc-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.15);
        }

        .doc-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        }

        .category-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .doc-title {
            font-size: 20px;
            font-weight: 600;
            color: #24292f;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .doc-title i {
            color: #667eea;
            font-size: 24px;
        }

        .doc-filename {
            font-size: 14px;
            color: #57606a;
            font-family: 'Monaco', 'Courier New', monospace;
            margin-bottom: 15px;
            background: #f6f8fa;
            padding: 8px 12px;
            border-radius: 6px;
            word-break: break-all;
        }

        .doc-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #57606a;
            padding-top: 15px;
            border-top: 1px solid #e1e4e8;
        }

        .doc-meta i {
            margin-right: 5px;
            color: #667eea;
        }

        .no-results {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .no-results i {
            font-size: 64px;
            color: #d0d7de;
            margin-bottom: 20px;
        }

        .no-results h3 {
            font-size: 24px;
            color: #24292f;
            margin-bottom: 10px;
        }

        .no-results p {
            color: #57606a;
            font-size: 16px;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            color: white;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }

            .header h1 {
                font-size: 32px;
            }

            .header p {
                font-size: 16px;
            }

            .stats {
                flex-direction: column;
                gap: 15px;
            }

            .docs-grid {
                grid-template-columns: 1fr;
            }

            .search-box {
                padding: 15px;
            }
        }

        /* Animation for cards */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .doc-card {
            animation: fadeInUp 0.5s ease-out;
        }

        .doc-card:nth-child(1) { animation-delay: 0.1s; }
        .doc-card:nth-child(2) { animation-delay: 0.15s; }
        .doc-card:nth-child(3) { animation-delay: 0.2s; }
        .doc-card:nth-child(4) { animation-delay: 0.25s; }
        .doc-card:nth-child(5) { animation-delay: 0.3s; }
        .doc-card:nth-child(6) { animation-delay: 0.35s; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-book"></i> Documentation Library</h1>
            <p>Browse and explore all available documentation files</p>
            <p><small>Powered by <strong>DocGen</strong> Package</small></p>
            <div class="stats">
                <div class="stat-item">
                    <i class="fas fa-file-alt"></i>
                    <span><strong>{{ $totalFiles }}</strong> Documents</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-clock"></i>
                    <span>Updated {{ date('M j, Y') }}</span>
                </div>
            </div>
        </div>

        <div class="search-box">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input
                    type="text"
                    id="searchInput"
                    class="search-input"
                    placeholder="Search documentation by title or filename... (Ctrl+K)"
                    autocomplete="off"
                >
            </div>
        </div>

        <div class="docs-grid" id="docsGrid">
            @forelse($files as $file)
                <a href="{{ route('documentation.viewer', $file['path']) }}" class="doc-card" data-title="{{ strtolower($file['title']) }}" data-filename="{{ strtolower($file['filename']) }}" style="text-decoration: none; color: inherit;">
                    <span class="category-badge">{{ $file['category'] }}</span>
                    <div class="doc-title">
                        <i class="fas fa-file-code"></i>
                        <span>{{ $file['title'] }}</span>
                    </div>
                    <div class="doc-filename">
                        <i class="fas fa-terminal"></i> {{ $file['filename'] }}
                    </div>
                    <div class="doc-meta">
                        <span>
                            <i class="fas fa-hdd"></i>
                            {{ $file['size'] }}
                        </span>
                        <span>
                            <i class="far fa-calendar"></i>
                            {{ $file['modified'] }}
                        </span>
                    </div>
                </a>
            @empty
                <div class="no-results">
                    <i class="fas fa-folder-open"></i>
                    <h3>No Documentation Found</h3>
                    <p>There are no Markdown files in the docs directory.</p>
                </div>
            @endforelse
        </div>

        <div id="noResults" class="no-results" style="display: none;">
            <i class="fas fa-search"></i>
            <h3>No Results Found</h3>
            <p>Try searching with different keywords.</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} DocGen Package by S. M. Mahfujur Rahman</p>
        </div>
    </div>

    <script>
        // Real-time search functionality
        const searchInput = document.getElementById('searchInput');
        const docsGrid = document.getElementById('docsGrid');
        const noResults = document.getElementById('noResults');
        const docCards = document.querySelectorAll('.doc-card');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            let visibleCount = 0;

            docCards.forEach(card => {
                const title = card.getAttribute('data-title');
                const filename = card.getAttribute('data-filename');

                if (title.includes(searchTerm) || filename.includes(searchTerm)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCount === 0 && searchTerm !== '') {
                docsGrid.style.display = 'none';
                noResults.style.display = 'block';
            } else {
                docsGrid.style.display = 'grid';
                noResults.style.display = 'none';
            }
        });

        // Keyboard shortcut for search (Ctrl/Cmd + K)
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                searchInput.focus();
            }

            // ESC to clear search
            if (e.key === 'Escape') {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('input'));
                searchInput.blur();
            }
        });

        // Add tooltip for keyboard shortcut
        searchInput.setAttribute('title', 'Press Ctrl+K or Cmd+K to focus search');
    </script>
</body>
</html>
