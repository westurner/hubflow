---
layout: default
title: ChangeLog
prev: '<a href="Examples.html">Prev: Examples</a>'
next: '<a href="index.html">Back to: HubFlow: GitFlow For GitHub</a>'
---
# ChangeLog

## v1.6.0 - in progress

### New:

* `git hf support`

  __Support branches!!__ :)

  A support branch is branched off master to be a long-lived branch for maintenance.  You can create features, releases and hotfixes from a support branch; when you finish them, they get merged back into the support branch (__not__ into develop or master).

  For example, you might do `git hf support start 1.6.x 1.6.0` to create the branch __support/1.6.x__, branched from the tag __1.6.0__.  This allows you to do maintenance and small changes for v1.6.1, 1.6.2 etc etc whilst your develop branch marches onwards to v1.7 and beyond.

* `git hf feature checkout`

  I've completely overhauled the `git hf feature checkout` command; the old version wasn't helpful enough.

  Credit to [bmomberger-reciprocity](https://github.com/bmomberger-reciprocity) and [jhofmeyr](https://github.com/jhofmeyr) for this.

* `git hf feature list`

  This has been updated to now also show feature branches at origin.

* `git hf feature rename`, `git hf hotfix rename` and `git hf release rename`

  I've added three new commands for renaming feature, hotfix and release branches.  They're a bit easier than having to remember the individual commands for dealing with local and remote branch renames.

* `git hf hotfix finish -M` and `git hf release finish -M`

  The new `-M` switch will use the branch name (which is normally a version number) as the commit message when the branch is merged.

* Initial support for GitHub Enterprise

  If you're using GitHub Enterprise, set the environment variable `GITHUB_ENTERPRISE_HOST` to the hostname of your copy of GitHub Enterprise.

  Many thanks to [bahulneel](https://github.com/bahulneel) for this feature.

* `git hf init` now detects 'origin' and requires at least one remote

  When you run `git hf init`, we now look at the list of remotes available in the repository to work out where to push to.  This is required for some software package managers which can clone Git repositories but which don't use 'origin' for the name of the remote.

  As part of this, running `git hf init` before you've added at least one remote is now a fatal error.

  Many thanks to [fvalverd](https://github.com/fvalverd) for contributing to this feature.

### Fixes:

* `git hf feature track` is really gone this time

   The command was dropped in an earlier release, but was still listed in the built-in help.  Now removed.  Many thanks to [jtsoi](https://github.com/jtsoi) for this fix.

* `git hf feature submit`: delete the pull-request file after submission

   Many thanks to [huafu](https://github.com/huafu) for this fix.

## v1.5.2 - 29th July 2013

This release is a bug-fix release.

### Fixes:

* __git hf feature start__: set up the remote tracking branch correctly
* __git hf update__: go back to branch we started on after updating all the branches

## v1.5.1 - 24th March 2013

So many people turned out to be using v1.5.0 straight from the develop branch that it seemed best to bump the version to v1.5.1 before final release.  Thank you to everyone for the feedback - keep it coming!

### New:

* __install.sh__: now supports INSTALL_INTO environment variable if you want to change the install location (the default is /usr/local/bin)
* __git hf pull__: bring down and merge changes from the remote master, develop and current branches
* __git hf push__: a more generic (and long-term) replacement for the 'feature publish' et al commands
* __git hf feature push -F__: new --force feature which _will_ overwrite origin's copy of the branch with your copy (thanks to [bsedat](https://github.com/bsedat) for the patch)
* __git hf update__: new --no-prune flag to disable 'git fetch --prune'

### Fixed:

* __install.sh__ does not require sudo/root if target folder is writeable (thanks to [mborsuk](https://github.com/mborsuk) for the patch) - might help folks trying to install using Cygwin
* __git hf init__: if this command creates the 'develop' branch, it now pushes that branch back up to origin automatically
* __git hf hotfix start__: fetches latest refs from origin before attempting sanity checks; should keep things more consistent
* __git hf release start__: fetches latest refs from origin before attempting sanity checks; should keep things more consistent
* __git hf feature cancel__: deletes the local branch even if it contains unmerged changes (thanks to [mheap](https://github.com/mheap) for the patch)
* __git hf feature finish__: pull down latest changes from origin; avoids manual 'git hf update' first
* __git hf feature finish__: clearer message when a feature has not yet been merged via a GitHub pull request
* __git hf feature submit__: now supports the VISUAL and EDITOR environment variables (thanks to [mbrace](https://github.com/mbrace) for the patch)
* __git hf release finish__: pull down latest changes from origin; avoids manual 'git hf update' first
* __git hf hotfix finish__: pull down latest changes from origin; avoids manual 'git hf update' first
* __git hf (feature|hotfix|release) start__: refactored to increase amount of shared code
* __git hf update__: does not switch to master or develop branch if there are no changes to merge in (speed improvement!)
* __git hf update__: does not push to origin if there are no changes to merge in (speed improvement!)
* __merge conflicts__: refactored to simplify, standardise the behaviour across all commands
* __co-existing with gitflow__: you can now install the original gitflow tools and the hubflow tools alongside each other with no file conflicts
* various portability improvements for OS X (thanks to [mbrace](https://github.com/mbrace) for the patches)
* __Improved README__ file (thanks to [j0k3r](https://github.com/j0k3r) for the patch)
* __Fixed the [poster](http://datasift.github.com/gitflow/GitFlowForGitHub.html#the_poster)__ to recommend the new commands added in v1.5

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