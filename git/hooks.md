# Git Hooks

There are several git hooks that can improve code quality and some stupid mistakes.

`pre-commit` hooks:

 - php lint: validate php files syntax (`php -l`)
 - php-cs-fixer: fix php formatting regarding symfony 2.1 coding standards

### Hooks Setup

You will need to clone `cody` repository locally.
Also you will need [php-cs-fixer](https://github.com/fabpot/php-cs-fixer).

When you get this done you can create symlink `cody/git/hook` to `your-project/.git/hooks`:

Linux/MacOS:

```sh
cd your/project/path
rm -f .git/hooks
ln -s cody/git/hooks .git/hooks
chmod +x .git/hooks/pre-commit
```

windows (**only from cmd, wouldn't work in powershell**):

```cmd
cd your/project/path/.git
rm -f .git/hooks
mklink /D .git/hooks cody/git/hooks
```
