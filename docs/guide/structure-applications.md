Applications
============

There are four applications in advanced template: api, frontend, backend and console. API is REST API architecture used communicate
over the Hypertext Transfer Protocol with the same HTTP verbs (GET, POST, PUT, DELETE, etc.). Frontend is typically what is presented
to end user, the project itself. Backend is admin panel, analytics and such functionality. Console is typically used for
cron jobs and low-level server management. Also it's used during application deployment and handles migrations and assets.

There's also a `common` directory that contains files used by more than one application. For example, `User` model.

api, frontend and backend are web applications and  contain the `web` directory. That's the webroot you should point your
web server to.

Each application has its own namespace and alias corresponding to its name. Same applies to common directory.
