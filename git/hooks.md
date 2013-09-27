# Git Hooks

There are several git hooks that can improve code quality and some stupid mistakes.

`pre-commit` hooks:

 - php lint: validate php files syntax (`php -l`)
 - php-cs-fixer: fix php formatting regarding symfony 2.1 coding standards

### Hooks Setup

You will need to clone `cody` repository locally.
Also you will need to install [php-cs-fixer](https://github.com/fabpot/php-cs-fixer).

When you get this done you can create symlink `<path-to-cody>/git/hook` to `<your-project-folder>/.git/hooks`:

Linux/MacOS:

```sh
cd <your-project-folder>
rm -r .git/hooks
ln -s <path-to-cody>/git/hooks .git/hooks
chmod +x .git/hooks/pre-commit
```

Windows:

```cmd
# we can't create symlinks in windows so have to copy hooks
cp <path-to-cody>/git/hooks/* <your-project-folder>/.git/hooks/
```
