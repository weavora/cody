# Git

## Branches/tags naming conventions

1. Every branch name should be lowercase and use "-" as words separator

    RIGHT: `generation-improvements`, `issue-with-categories`, `issue-3`

    WRONG: `generationImprovements`, `issue_with_categories`, `3-issue`

2. Versioned branches should be named in format `vX.Y.Z`

    RIGHT: `v1.0`, `v2.0.5`

    WRONG: `1.0`, `v205`, `ver.1`, `v3`, `proj-1.0`


## Commit messages conventions


1. If message contains issue reference it should be placed first, prepended with "#" and appended with space

    RIGHT: `#56 tasks: add/edit form`

    WRONG: `#56. tasks: add/edit form`, `tasks: add/edit form for #56`

2. Commit message should contains text which can identify what you did in commit without following to references

    RIGHT: `#218 products: list view for category`

    WRONG: `#218 list view for category`

3. If you want put multiple items in message, please, use ";" as separator

    RIGHT: `#89 tasks: active list; #90: tasks: closed list; #91 tasks: issue with task comments`

See also:

[Git hooks](hooks.md)