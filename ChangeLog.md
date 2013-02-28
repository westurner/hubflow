---
layout: default
title: ChangeLog
prev: '<a href="Examples.html">Prev: Examples</a>'
next: '<a href="index.html">Back to: HubFlow: GitFlow For GitHub</a>'
---
# ChangeLog

## v1.5.0 - in progress

### New:

* __git hf pull__: bring down and merge changes from the remote master, develop and current branches
* __git hf push__: a more generic (and long-term) replacement for the 'feature publish' et al commands
* __git hf feature push -F__: new --force feature which _will_ overwrite origin's copy of the branch with your copy (thanks to [bsedat](https://github.com/bsedat) for the patch)
* __git hf update__: new --no-prune flag to disable 'git fetch --prune'

### Fixed:

* __install.sh__ does not require sudo/root if target folder is writeable (thanks to [mborsuk](https://github.com/mborsuk) for the patch) - might help folks trying to install using Cygwin
* __git hf hotfix start__: fetches latest refs from origin before attempting sanity checks; should keep things more consistent
* __git hf release start__: fetches latest refs from origin before attempting sanity checks; should keep things more consistent
* __git hf feature cancel__: deletes the local branch even if it contains unmerged changes (thanks to [mheap](https://github.com/mheap) for the patch)
* __git hf feature finish__: pull down latest changes from origin; avoids manual 'git hf update' first
* __git hf feature finish__: clearer message when a feature has not yet been merged via a GitHub pull request
* __git hf release finish__: pull down latest changes from origin; avoids manual 'git hf update' first
* __git hf hotfix finish__: pull down latest changes from origin; avoids manual 'git hf update' first
* __git hf (feature|hotfix|release) start__: refactored to increase amount of shared code
* __git hf update__: does not switch to master or develop branch if there are no changes to merge in (speed improvement!)
* __git hf update__: does not push to origin if there are no changes to merge in (speed improvement!)
* __merge conflicts__: refactored to simplify, standardise the behaviour across all commands
* __Improved README__ file (thanks to [j0k3r](https://github.com/j0k3r) for the patch)

### Dropped:

We've removed the following features, as they don't fit into our core idea of Hubflow as a workflow that is focused on interacting primarily with GitHub:

* __git hf feature pull__: is now an alias for `git hf pull`
* __git hf feature push__: is now an alias for `git hf push`
* __git hf feature track__: command deleted
* __git hf hotfix pull__: is now an alias for `git hf pull`
* __git hf hotfix push__: is now an alias for `git hf push`
* __git hf hotfix track__: command deleted
* __git hf release pull__: is now an alias for `git hf pull`
* __git hf release push__: is now an alias for `git hf push`
* __git hf release track__: command deleted

## v1.4.2 - 19th February 2013

### Fixed:

* __git hf release pull__ should now work (was incomplete) (thanks to neonal)
* __git hf release push__ should now work (was incomplete) (thanks to neonal)
* Bug fix for incompatibility with Git v1.7.10.2 (Apple Git-33)

## v1.4.1 - 12th October 2012

### Fixed:

* __git hf init__ now creates a __master__ branch if the repo currently does not have one

## v1.4.0 - 3rd October 2012

### New:

* __git hf hotfix cancel__: deletes a hotfix branch that is in progress.
* __git hf feature cancel__: deletes a feature branch that is in progress.
* __git hf feature finish__ will abort if the feature hasn't yet been merged via a pull request. You can override this using the -f (force) flag.

### Fixed:

* __git hf hotfix finish__ now deletes the remote hotfix branch first, to avoid warnings about partially merged branches.
* __git hf feature pull__ is now as verbose as all of the other commands, so that you can see what is happening
* __git hf feature pull__ now dies correctly if there's a problem talking to GitHub
* __git hf release cancel__ no longer merges into the __develop__ branch by default.

### Removed:

* __git hf feature publish__: not needed, use _git hf feature push_ instead.