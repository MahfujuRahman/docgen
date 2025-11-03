<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Documentation' }}</title>

    <!-- GitHub Markdown CSS for beautiful styling -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.5.1/github-markdown-light.min.css">

    <!-- Syntax highlighting for code blocks -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Noto Sans', Helvetica, Arial, sans-serif;
            background-color: #f6f8fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 45px;
            border-bottom: 3px solid #5568d3;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }

        .header p {
            margin: 8px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .markdown-body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 100%;
            margin: 0;
            padding: 45px;
        }

        .markdown-body h1,
        .markdown-body h2 {
            border-bottom: 1px solid #e1e4e8;
            padding-bottom: 0.3em;
        }

        .markdown-body h1:first-child,
        .markdown-body h2:first-child {
            margin-top: 0;
        }

        .markdown-body pre {
            background-color: #f6f8fa;
            border-radius: 6px;
            padding: 16px;
        }

        .markdown-body code {
            background-color: rgba(175, 184, 193, 0.2);
            border-radius: 6px;
            padding: 0.2em 0.4em;
            font-size: 85%;
        }

        .markdown-body pre code {
            background-color: transparent;
            padding: 0;
        }

        .markdown-body table {
            border-collapse: collapse;
            width: 100%;
            margin: 16px 0;
        }

        .markdown-body table th,
        .markdown-body table td {
            border: 1px solid #d0d7de;
            padding: 8px 13px;
        }

        .markdown-body table th {
            background-color: #f6f8fa;
            font-weight: 600;
        }

        .markdown-body table tr:nth-child(even) {
            background-color: #f6f8fa;
        }

        .markdown-body blockquote {
            border-left: 4px solid #d0d7de;
            padding-left: 16px;
            color: #57606a;
            margin-left: 0;
        }

        .markdown-body a {
            color: #0969da;
            text-decoration: none;
        }

        .markdown-body a:hover {
            text-decoration: underline;
        }

        .footer {
            padding: 20px 45px;
            background-color: #f6f8fa;
            border-top: 1px solid #d0d7de;
            text-align: center;
            color: #57606a;
            font-size: 14px;
        }

        @media (max-width: 767px) {
            .header {
                padding: 20px 15px;
            }

            .header h1 {
                font-size: 22px;
            }

            .markdown-body {
                padding: 20px 15px;
            }

            .footer {
                padding: 15px;
            }
        }

        /* Print styles */
        @media print {
            .header {
                background: #667eea;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .container {
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title }}</h1>
            <p>Documentation Viewer - Powered by DocGen Package</p>
        </div>

        <div class="markdown-body">
            {!! $content !!}
        </div>

        <div class="footer">
            <p>Generated on {{ date('F j, Y') }} | DocGen Package by S. M. Mahfujur Rahman</p>
        </div>
    </div>

    <script>
        // Initialize syntax highlighting for code blocks
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightElement(block);
            });
        });

        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add copy button to code blocks
        document.querySelectorAll('pre').forEach((block) => {
            const button = document.createElement('button');
            button.innerText = 'Copy';
            button.style.cssText = `
                position: absolute;
                top: 5px;
                right: 5px;
                padding: 4px 8px;
                font-size: 12px;
                background: #ffffff;
                border: 1px solid #d0d7de;
                border-radius: 4px;
                cursor: pointer;
                opacity: 0;
                transition: opacity 0.2s;
            `;

            const wrapper = document.createElement('div');
            wrapper.style.position = 'relative';

            block.parentNode.insertBefore(wrapper, block);
            wrapper.appendChild(block);
            wrapper.appendChild(button);

            wrapper.addEventListener('mouseenter', () => {
                button.style.opacity = '1';
            });

            wrapper.addEventListener('mouseleave', () => {
                button.style.opacity = '0';
            });

            button.addEventListener('click', () => {
                const code = block.querySelector('code') || block;
                navigator.clipboard.writeText(code.innerText).then(() => {
                    button.innerText = 'Copied!';
                    button.style.background = '#2da44e';
                    button.style.color = '#ffffff';
                    button.style.borderColor = '#2da44e';

                    setTimeout(() => {
                        button.innerText = 'Copy';
                        button.style.background = '#ffffff';
                        button.style.color = '#000000';
                        button.style.borderColor = '#d0d7de';
                    }, 2000);
                });
            });
        });
    </script>
</body>

</html>
