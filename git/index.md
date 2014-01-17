# Git

## Branches/tags naming conventions

1. Every branch name should be lowercased and use "-" as a word separator

    RIGHT: `generation-improvements`, `issue-with-categories`, `issue-3`

    WRONG: `generationImprovements`, `issue_with_categories`, `3-issue`

2. Versioned branches should be named as `vX.Y.Z`

    RIGHT: `v1.0`, `v2.0.5`

    WRONG: `1.0`, `v205`, `ver.1`, `v3`, `proj-1.0`


## Commit messages conventions


1. If a message contains an issue reference, the number should be placed first, prepended with "#" and appended with a space

    RIGHT: `#56 tasks: add/edit form`

    WRONG: `#56. tasks: add/edit form`, `tasks: add/edit form for #56`

2. A commit message should contain text that identifies what you have done in the commit without the necessity to follow references

    RIGHT: `#218 products: list view for category`

    WRONG: `#218 list view for category`

3. If you want to put multiple items in a message, please use ";" as a separator

    RIGHT: `#89 tasks: active list; #90: tasks: closed list; #91 tasks: issue with task comments`

See also:

[Git hooks](hooks.md)
