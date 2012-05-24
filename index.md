---
layout: default
title: "HubFlow: GitFlow For GitHub"
prev: '&nbsp;'
next: '<a href="IntroducingGitFlow.html">Next: Introducing GitFlow</a>'
---
# HubFlow: GitFlow For GitHub

## Introduction

At [DataSift](http://datasift.com), we've standardised on:

* using __Git__ for our source control,
* using __GitHub__ to host our public and private Git repositories,
* and using __GitFlow__ as our common workflow

This website explains how we've adapted GitFlow and the GitFlow tools git extension for working with GitHub.  This is how we work internally, and we're sharing this in the hope that others find it useful too.

## What We Cover

On this site, you'll find:

* __[Introducing GitFlow](IntroducingGitFlow.html)__: this is how we explain what GitFlow is to new employees when they join the company.  If you're learning about GitFlow for the first time, you should also read [Vincent Driessen's original blog post introducing GitFlow](http://nvie.com/posts/a-successful-git-branching-model/).
* __[The HubFlow Tools](TheGitFlowTools.html)__: this is an introduction to our GitHub-focused fork of the [GitFlow extension for git](https://github.com/nvie/gitflow), which we've called __HubFlow__ to avoid any confusion with the original GitFlow extension commands.  Includes installation instructions and how to contribute patches back.
* __[Using GitFlow With GitHub](UsingGitFlowWithGitHub.html)__: this is probably the page you're really looking for.  It explains how to apply the GitFlow branching model if you're using GitHub for hosting, and includes all the commands you need for each of the common tasks you'll do.
* __[Versioning](Versioning.html)__: to finish off, we look at why version numbers matter, and how you should use them in your projects.

We hope you find this useful, and time-saving.

## Licence

Just like Vincent's original GitFlow post, every page on this website is published under the [Creative Commons CC BY-SA](http://creativecommons.org/licenses/by-sa/3.0/nl/deed.en_GB) licence, and our __HubFlow__ fork of the GitFlow tools is licenced under the [BSD 2-Clause Licence](https://github.com/datasift/gitflow/blob/develop/LICENSE).

You'll find the source code for this website in the [gh-pages branch of our gitflow repo on GitHub](https://github.com/datasift/gitflow/tree/gh-pages).  If you spot a mistake or have an idea how to improve this website, pull requests are most welcome :)