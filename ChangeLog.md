---
layout: default
title: ChangeLog
prev: '<a href="Examples.html">Prev: Examples</a>'
next: '<a href="index.html">Back to: HubFlow: GitFlow For GitHub</a>'
---
# ChangeLog

## HubFlow v1.4 - IN PROGRESS

### New:

* __git hf hotfix cancel__: deletes a hotfix branch that is in progress.
* __git hf feature cancel__: deletes a feature branch that is in progress.
* __git hf feature finish__ will abort if the feature hasn't yet been merged via a pull request. You can override this using the -f (force) flag.

### Fixed:

* __git hf hotfix finish__ now deletes the remote hotfix branch first, to avoid warnings about partially merged branches.
* __git hf feature pull__ is now as verbose as all of the other commands, so that you can see what is happening
* __git hf feature pull__ now dies correctly if there's a problem talking to GitHub
* __git hf release cancel__ no longer merges into the __develop__ branch by default.