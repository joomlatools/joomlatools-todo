# Joomla Todo component

[![Codacy Badge](https://www.codacy.com/project/badge/59e4bde131224ecca061404135c41f36)](https://www.codacy.com/app/timble/joomla-todo)

## What is Joomla Todo?

Joomla Todo is an example component for the [Joomlatools Framework](https://github.com/joomlatools/joomlatools-framework). It's a simple todo list solution with logging support.

It's a code 'kata' component and is used to demonstrate the power and magic of  [Joomlatools Framework](https://github.com/joomlatools/joomlatools-framework) by trying to do as much as possible with as few lines of code as possible as fast as possible.

> *A code kata is a simple exercise used to sharpen programming skills. You only actually practice problem solving the very first time you perform the kata. Then you repeat, and repeat again. And again. The objective of the exercise is to practice speed, technique and tools.*

## Requirements

- Joomlatools Framework 2 or newer.

## Installation

Joomla Todo can be installed directly into a working Joomla installation by using [Composer](https://getcomposer.org/).

Go to the root directory of your Joomla installation in command line and execute this command:

```
composer require joomlatools/joomlatools-todo:1.*
```

## Making changes

There's no better way to learn how something works than to fiddle around in it. The easiest way to do this is by symlinking the component into a Joomla installation. Using our [Joomlatools Vagrant box](http://developer.joomlatools.com/tools/vagrant.html) you can do this with a few simple commands:

1. Install [Joomlatools Vagrant box](http://developer.joomlatools.com/tools/vagrant.html) and start it with the `vagrant up` command.
1. The box will automatically create a `Projects` folder for you. Clone this repository in there:

    ```
cd Projects
git clone https://github.com/joomlatools/joomlatools-todo.git
    ```

1. Open up the [web terminal](http://joomla.box:3000) or SSH into the Joomlatools Vagrant box with `vagrant ssh`
1. Create a new Joomla site that symlinks the Todo component using the following command:

    ```
joomla site:create todo --symlink=joomlatools-todo
    ```

1. The Todo component is now installed but we still need to include its dependencies. If we install the component with Composer as explained above, this is taken care for us automatically. We need the [joomlatools-framework](https://github.com/joomlatools/joomlatools-framework) and [nooku-activities component](https://github.com/nooku/nooku-activities) packages too. We can install these using Composer:

    ```
composer require joomlatools/joomlatools-framework:~3.0 nooku/nooku-activities:~3.0 --working-dir=/var/www/todo
    ```

1. With everything in place, we can install the component into Joomla by running the installer:

    ```
joomla extension:install todo com_todo
    ```

1. Browse to [joomla.box/todo](http://joomla.box/todo), fire up the Todo codebase in your favorite code editor and have fun!

## Contributing

We appreciate any contribution to Todo, whether it is related to bugs, grammar, or simply a suggestion or
improvement. We ask that any contribution follows a few simple guidelines in order to be properly received.

We follow the [GitFlow][gitflow-model] branching model, from development to release. If you are not familiar with it,
there are several guides and tutorials online to learn about it.

There are a few things you must know before submitting a pull request:

- All changes need to be made against the `develop` branch. However, it is very well appreciated and highly suggested to start a new feature branch from `develop` and make your changes in this new branch. This way we can just checkout your feature branch for testing before merging it into `develop`.
- We will not consider pull requests made directly to the `master` branch.

## License

Joomlatools Todo is open-source software licensed under the [GPLv3 license](https://github.com/joomlatools/joomlatools-todo/blob/master/LICENSE.txt).

[gitflow-model]: http://nvie.com/posts/a-successful-git-branching-model/
