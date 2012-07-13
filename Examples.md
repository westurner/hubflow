---
layout: default
title: Examples
prev: '<a href="Versioning.html">Prev: Versioning</a>'
next: '<a href="ChangeLog.html">Next: ChangeLog</a>'
---
# Examples

## Introduction

To finish off our explaination of using GitFlow with GitHub, we've got some examples of different builds of software.

## Questions

In the following examples, can you say ...

* what the version number change means?
* if the change breaks backwards-compatibility or not?
* which branch or branches the build may have come from?
* which kinds of environments the build can be installed into?

Here are the example version numbers:

1. foobar-1.0.0-SNAPSHOT20120512
1. foobar-1.0.0-SNAPSHOT20120512
1. foobar-1.0.0 -> foobar-1.0.1
1. foobar-1.0.1 -> foobar-1.0.2-rc1
1. foobar-1.0.2 -> foobar-1.1.0-rc1
1. foobar-1.2.0 -> foobar-2.0.0

## Answers

__foobar-1.0.0-SNAPSHOT20120512__:

* This is a development snapshot
* It might break backwards compatibility
* It will have been built from a feature branch, or from the develop branch
* It can be installed on dev boxes and integration environments.

__foobar-1.0.0 -> foobar-1.0.1__:

* This is a bugfix release
* It does not break backwards compatibility
* It will have been built from the master branch
* It can be installed everywhere

__foobar-1.0.1 -> foobar-1.0.2-rc1__:

* This is a bugfix release candidate
* It does not break backwards compatibility
* It will have been built from the hotfix branch called hotfix/1.0.1
* It can be installed everywhere except production

__foobar-1.0.2 -> foobar-1.1.0-rc1__:

* This is a release candidate for a minor release
* It does not break backwards compatibility
* It will contain new features
* It may also contain bugfixes
* It will have been built from the release branch called release/1.1.0
* It can be installed everywhere except production

__foobar-1.2.0 -> foobar-2.0.0__:

* This is a major new release
* It may break backwards compatibility
* It will have been built from the master branch
* It can be installed everywhere