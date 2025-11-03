# Changelog

All notable changes to `ajmain/docgen` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2025-11-03

### Added
- Initial release
- Beautiful GitHub-style Markdown rendering
- Real-time search functionality with Ctrl+K shortcut
- Syntax highlighting for code blocks using Highlight.js
- Copy code button on hover
- Responsive design for mobile, tablet, and desktop
- Automatic route registration via Service Provider
- Security features (file type validation, directory traversal protection)
- Configurable route prefix and docs path
- Support for subdirectory organization with automatic categorization
- Publishable configuration, views, and documentation files
- Laravel 10.x, 11.x, and 12.x support
- PHP 8.1, 8.2, and 8.3 support

### Features
- **Documentation Index**: Grid-based card layout showing all documentation files
- **Search**: Real-time filtering with keyboard shortcuts
- **Viewer**: Clean, readable documentation pages with GitHub styling
- **Code Blocks**: Syntax highlighting with copy functionality
- **File Organization**: Automatic categorization by directory structure
- **Security**: Built-in protection against common vulnerabilities

### Configuration
- Customizable route prefix (default: 'documentation')
- Customizable docs directory (default: 'docs')
- Toggle for automatic route registration
- CommonMark converter configuration options

[Unreleased]: https://github.com/yourusername/docgen/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/yourusername/docgen/releases/tag/v1.0.0
