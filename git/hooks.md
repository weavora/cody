# Git Hooks

There are several git hooks that can improve code quality and help avoid some silly mistakes.

`pre-commit` hooks:

 - php lint: validates php files syntax (`php -l`)
 - php-cs-fixer: fixes php formatting based on symfony 2.1 coding standards

### Hooks Setup

You will need to clone the `cody` repository locally.
You will also need to install [php-cs-fixer](https://github.com/fabpot/php-cs-fixer).

When you get this done, you can create a symlink `<path-to-cody>/git/hook` to `<your-project-folder>/.git/hooks`:

Linux/MacOS:

```sh
cd <your-project-folder>/.git
rm -r hooks
ln -s <path-to-cody>/git/hooks hooks
chmod +x hooks/pre-commit
```

Windows:

```cmd
# we can't create symlinks in windows so have to copy hooks
cp <path-to-cody>/git/hooks/* <your-project-folder>/.git/hooks/
```
