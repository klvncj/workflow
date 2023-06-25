# Work flow - Staff Management System

This repository contains a staff management system written in PHP. It provides a web-based interface for managing staff, assigning tasks, handling leave requests, and facilitating communication between users. The system is designed to be deployed on a local development environment using XAMPP.

## Installation

To use the staff management system, follow these steps:

1. Clone the repository into your XAMPP `htdocs` directory:
   ```
   git clone https://github.com/klvncj/workflow.git
   ```

2. Import the staff database into XAMPP:
   - Launch the XAMPP control panel and start the Apache and MySQL services.
   - Open your web browser and visit `http://localhost/phpmyadmin`.
   - Create a new database called `staff`.
   - Import the `staff.sql` file located in the repository's root directory into the newly created database.

3. Copy the `index.php` file path from the cloned repository .

4. Open your web browser and enter the file path then replace from htdoc and below with `http://localhost` in the URL bar.

## Features

The staff management system offers the following features:

### User Features:
- **Chat with Users:** Engage in real-time communication with other staff members through a chat interface.
- **Create Report Request:** Generate and submit reports to share information or highlight issues.
- **Request Leave:** Request time off from work by submitting a leave request.
- **Create Task:** Create tasks for yourself or assign tasks to other staff members.

### Admin Features:
- **Accept or Deny Leave Request:** Administrators can review and approve/deny leave requests submitted by staff members.
- **Manage Staff:** Add or remove staff members from the system, ensuring an up-to-date staff directory.
- **Create Activities:** Define activities or projects to track progress and assign them to staff members.
- **Assign Tasks to Individuals:** Assign specific tasks to individual staff members based on their roles or capabilities.
- **View Staff Data:** Access and review staff-related information, such as personal details and employment history.

## Contribution

Contributions to the staff management system are welcome. If you would like to contribute, please follow these steps:

1. Fork the repository on GitHub.
2. Clone your forked repository to your local development environment.
3. Make your desired changes or additions.
4. Commit and push your changes to your forked repository.
5. Submit a pull request detailing your changes and their purpose.

Please ensure that your contributions align with the repository's code of conduct and are aimed at enhancing the existing features or introducing new features that align with the overall purpose of the staff management system.

## License

The staff management system is released under the [MIT License](https://opensource.org/licenses/MIT). Feel free to use, modify, and distribute the code as per the terms of this license.

## Acknowledgements

We would like to acknowledge the following open-source projects and libraries that have been utilized in the development of this staff management system:

- [PHP](https://www.php.net/) - Server-side scripting language used for web development.
- [XAMPP](https://www.apachefriends.org/index.html) - Local development environment for creating and testing PHP applications.

A big thank you to all contributors and supporters of this project who have helped make it better through their valuable feedback and contributions.
