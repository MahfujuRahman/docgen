# Welcome to DocGen!

## 🎉 Getting Started

Congratulations! You have successfully installed **DocGen** - a beautiful Laravel package for viewing Markdown documentation.

## 📖 What is DocGen?

DocGen is a lightweight Laravel package that automatically generates beautiful, GitHub-styled documentation pages from your Markdown files. It provides:

- ✅ **Beautiful UI** - GitHub-style rendering with syntax highlighting
- ✅ **Search Functionality** - Real-time search through your docs
- ✅ **Responsive Design** - Works perfectly on all devices
- ✅ **Zero Configuration** - Works out of the box
- ✅ **Secure** - Built-in protection against directory traversal

## 🚀 Quick Start

### Viewing Documentation

Simply visit the documentation index page:

```
http://your-app.test/documentation
```

### Adding Your Own Documentation

1. Navigate to the `docs` folder in your Laravel project root
2. Create or add your `.md` (Markdown) files
3. Refresh the documentation page - your files will appear automatically!

## 📝 Markdown Examples

### Headings

```markdown
# H1 Heading
## H2 Heading
### H3 Heading
```

### Code Blocks

```php
// PHP Example
Route::get('/hello', function () {
    return 'Hello, World!';
});
```

```javascript
// JavaScript Example
console.log('Hello from DocGen!');
```

### Tables

| Feature | Status |
|---------|--------|
| Markdown Rendering | ✅ |
| Syntax Highlighting | ✅ |
| Search | ✅ |
| Mobile Responsive | ✅ |

### Lists

**Unordered:**
- Item 1
- Item 2
  - Nested Item 2.1
  - Nested Item 2.2

**Ordered:**
1. First item
2. Second item
3. Third item

### Links and Images

[Visit Laravel](https://laravel.com)

![Placeholder](https://via.placeholder.com/600x200?text=DocGen+Package)

### Blockquotes

> "Documentation is a love letter that you write to your future self."
> - Damian Conway

## ⚙️ Configuration

You can customize DocGen by publishing the configuration file:

```bash
php artisan vendor:publish --tag=docgen-config
```

This will create `config/docgen.php` where you can configure:

- Route prefix (default: `documentation`)
- Documentation directory (default: `docs`)
- CommonMark settings

## 📁 Organizing Documentation

You can organize your documentation in folders:

```
docs/
├── getting-started.md
├── api/
│   ├── authentication.md
│   └── endpoints.md
├── guides/
│   ├── installation.md
│   └── deployment.md
└── examples/
    └── code-samples.md
```

Files in subdirectories will be categorized automatically!

## 🎨 Customizing Views

To customize the documentation views, publish them:

```bash
php artisan vendor:publish --tag=docgen-views
```

This will copy the views to `resources/views/documentations/` where you can modify them.

## 🔒 Security

DocGen includes built-in security features:

- **File Type Validation**: Only `.md` files can be accessed
- **Directory Traversal Protection**: Prevents access to files outside the docs folder
- **Path Validation**: Uses `realpath()` to prevent path bypasses

## 📚 Advanced Features

### Search Functionality

Use the search box on the index page to find documentation quickly:
- Press `Ctrl+K` (or `Cmd+K` on Mac) to focus the search
- Press `Escape` to clear the search

### Syntax Highlighting

Code blocks are automatically highlighted using Highlight.js:

```python
def hello_world():
    print("Hello from DocGen!")
    
hello_world()
```

### Copy Code Buttons

Hover over any code block to see a "Copy" button - click it to copy the code to your clipboard!

## 🛠️ Commands

### Publish All Assets

```bash
php artisan vendor:publish --tag=docgen
```

### Publish Specific Assets

```bash
# Configuration only
php artisan vendor:publish --tag=docgen-config

# Routes only
php artisan vendor:publish --tag=docgen-routes

# Views only
php artisan vendor:publish --tag=docgen-views

# Dummy documentation only
php artisan vendor:publish --tag=docgen-docs
```

## 💡 Tips & Tricks

1. **Use Headings Wisely**: The first `# Heading` in your markdown file will be used as the document title on the index page

2. **Add Emojis**: Make your docs fun with emojis! 🎉 📚 ✅

3. **Link Between Docs**: You can link to other documentation files:
   ```markdown
   [See API Docs](api/endpoints.md)
   ```

4. **Table of Contents**: For long documents, add a table of contents with anchor links:
   ```markdown
   ## Table of Contents
   - [Introduction](#introduction)
   - [Installation](#installation)
   - [Usage](#usage)
   ```

## 📦 Package Info

- **Package Name**: `ajmain/docgen`
- **Author**: S. M. Mahfujur Rahman
- **License**: MIT
- **Requirements**: PHP 8.1+, Laravel 10+

## 🤝 Contributing

Want to improve DocGen? Contributions are welcome!

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📄 License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🎯 Next Steps

Now that you're familiar with DocGen, here's what you can do:

1. **Delete this file** and add your own documentation
2. **Customize the views** to match your brand
3. **Organize your docs** into logical categories
4. **Share the documentation URL** with your team

Happy documenting! 📝✨

---

**Need Help?**

- Check the package repository for issues and updates
- Read the Laravel documentation for Blade templates
- Learn Markdown syntax for advanced formatting

**Made with ❤️ by S. M. Mahfujur Rahman**
