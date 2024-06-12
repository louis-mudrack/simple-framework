# Simple Framework

Welcome to Simple Framework, a lightweight yet powerful tool designed to streamline the development of dynamic websites. This framework provides a robust starting point with features like a grid system, dynamic navigation, template files, body classes, a back-to-top button, JS form validation, and a mailing system.

## Features

- **Grid System**: A flexible grid system to create responsive layouts.
- **Dynamic Navigation**: Easily manage your site's navigation links.
- **Template Files**: Reusable templates for header, footer, and more.
- **Body Classes**: Dynamically generate body classes for styling.
- **Back to Top Button**: A smooth back to top button.
- **JS Form Validation**: Client-side form validation.
- **Mailing System**: Integrated mailing system for contact forms.

## Getting Started

### Prerequisites

- Web server with PHP support (for backend features)
- Basic knowledge of HTML, CSS, JavaScript and PHP.

### Installation

1. Clone the repository to your local machine or download the ZIP file and extract it in your project directory.
   ```bash
   git clone https://github.com/yourusername/simple-framework.git
   ```
2. Edit the files and your good to go. You can start in the template and after that use it like in the index.php.
3. Make sure to fill in the Variables on top of the site.config.php and to edit the navigation in the [site.contents.php](/misc/site.contents.php).

## Usage

### Grid System

Utilize the grid system to create a responsive layout.

```html
  <div class="row">
    <div class="col default-6 large-3">Column 1</div>
    <div class="col medium-2 full-12">Column 2</div>
  </div>
```

### Dynamic Navigation

Implement dynamic navigation by editing site.contents.php. Use this syntax inside of the initial array.

```php
  "Home" => array(
      "url" => "/",
      "title" => "Welcom | Your Site title",
      "desc" => "Your site description.",
  ),
```

## Contributing

We welcome contributions! If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (git checkout -b feature/AmazingFeature).
3. Make your changes.
4. Commit your changes (git commit -m 'Add some AmazingFeature').
5. Push to the branch (git push origin feature/AmazingFeature).
6. Open a pull request.

Please ensure your code adheres to the project's coding standards and include appropriate tests and documentation.

## License

This project is licensed under the MIT License - see the [LICENSE](/LICENSE.md) file for details.

## Acknowledgments

Thank you for helping with this project:

- @Limiting-Ongoing-Work
