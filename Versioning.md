---
layout: default
title: Versioning
prev: '<a href="GitFlowForGitHub.html">Prev: Using GitFlow With GitHub</a>'
next: '<a href="Examples.html">Next: Examples</a>'
---
# Versioning

## Introduction

One of the topics that the [original GitFlow article](http://nvie.com/posts/a-successful-git-branching-model/) doesn't address at all is what scheme to adopt for your software's version numbers.

But we believe that life is easier for __everyone__ if version numbers __mean the same thing__ to everyone who is working on a piece of software.

## Semantic Versioning

[Semantic versioning](http://semver.org) is a very simple scheme built around the __X.Y.Z-buildNo__ concept (for example __2.6.0-2__ or __2.6.0-SNAPSHOT20120501__):

* Increment __Z__ when you fix something
* Increment __Y__ when you add a new feature
* Increment __X__ when you break backwards-compatibility or add major features
* Use the __buildNo__ to differentiate different builds off the same branch, and to differentiate between development, test and production builds.

## Version Numbers And GitFlow Branches

Here's what to build from which branch.

* __Feature branches__ and the __develop branch__ should always build __snapshot__ versions (e.g. 2.6.0-SNAPSHOT201205012).
* __Release branches__ and __hotfix branches__ should always build __release candidate__ versions (e.g. 2.6.0-0.rc1).
* The __master branch__ should always build unqualified versions - versions without build numbers (e.g. 2.6.0).

<p><span class="label label-important">Please remember:</span></p>

* When you create a new branch, you need to __manually update__ the software's version number.  The __HubFlow tools__ cannot do this for you.
* If you're using __RPM__, you need to put the __buildNo__ part of the version number into the __release__ tag in your spec file (or add a __release__ tag to the __configuration__ section if you're using Maven's RPM plugin).