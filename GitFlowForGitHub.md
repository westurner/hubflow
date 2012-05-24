---
layout: default
title: Using GitFlow With GitHub
---
# Using GitFlow With GitHub #

## Introduction ##

This is our recommended workflow for using:

* [The GitFlow branching model](http://nvie.com/posts/a-successful-git-branching-model/)
* \+ [our fork of the GitFlow tools](https://github.com/datasift/gitflow)
* \+ [GitHub](https://github.com)

together.  We're assuming you've already looked at stock GitFlow, and understand the concepts of __feature branches__, __release branches__, __hotfixes__, __releases__ and the __develop branch__.  If you haven't, please first read:

* [GitFlow](http://nvie.com/posts/a-successful-git-branching-model/) (Vincent Driessen's original blog post)
* [Introducing GitFlow](http://datasift.github.com/gitflow/IntroducingGitFlow.html) (our own introduction to GitFlow)

## The Poster ##

![GitFlow For GitHub](GitFlowWorkflowNoFork.png)

<p><span class="label label-info">The key points are:</span></p>

* Don't fork repos on GitHub - clone the master repo directly
* Push feature branches back to origin repo so others can collaborate
* Use the GitHub website to create pull requests from feature branches
* Don't accept your own pull requests!

## 1. Cloning A Repo ##

Clone the existing repo from GitHub to your local workstation:

{% highlight bash %}
git clone git@github.com:##orgname##/##reponame##
{% endhighlight %}

<p><span class="label label-important">Please remember:</span></p>

* Do not fork the repo on GitHub - clone the master repo directly.

## 2. Initialise GitFlow Tools ##

The GitFlow tools need to be initialised before they can be used:

{% highlight bash %}
cd ##reponame##
git branch master origin/master
git flow init -d
{% endhighlight %}

<p><span class="label label-important">Please remember:</span></p>

* You have to do this every time you clone a repo.

## 3. Create A Feature Branch ##

If you are creating a new feature branch, do this:

{% highlight bash %}
git flow feature start -F ##feature-name##
{% endhighlight %}

If you are starting to work on an existing feature branch, do this:

{% highlight bash %}
git flow feature checkout ##feature-name##
{% endhighlight %}

<p><span class="label label-important">Please remember:</span></p>

* All new work (new features, non-emergency bug fixes) __must__ be done in a new feature branch.
* Give your feature branches sensible names.  If you're working on a ticket, use the ticket number as the feature branch name (e.g. ticket-1234).

## 4. Publish The Feature Branch On GitHub ##

Push your feature branch back to GitHub straight away to:

1. claim that name before someone else does :)
1. make sure the feature branch exists on GitHub

{% highlight bash %}
git flow feature publish ##feature-name##
{% endhighlight %}

<p><span class="label label-important">Please remember:</span></p>

* If the feature branch already exists on the master repo, this command will fail with an error.

<p><span class="label label-info">Notes:</span></p>

* We're going to merge this step into step 3 at some point in the future.

## 5. Keep Up To Date ##

You'll need to bring down completed features & hotfixes from other developers, and merge them into your feature branch regularly.  (Once a day, first thing in the morning, is a good rule of thumb).

{% highlight bash %}
# if you're not on your feature branch
git flow feature checkout ##feature-name##

# pull down master and develop branches
git flow update

# merge develop into your feature branch
git merge develop
{% endhighlight %}

## 6. Collaborate With Others ##

{% highlight bash %}
git flow feature push
{% endhighlight %}

{% highlight bash %}
git flow feature pull
{% endhighlight %}

## 7. Merge Your Feature Into Develop Branch ##

{% highlight bash %}
git flow feature push
{% endhighlight %}

Then, use the GitHub website to create a pull request to ##reponame##/develop branch from ##reponame##/feature/##feature-name##.

Ask a colleague to review your pull-request; don't accept it yourself unless you have to.  Once the pull request has been accepted, close your feature using the GitFlow tools:

{% highlight bash %}
git flow feature finish -F
{% endhighlight %}

## 8. Creating Releases ##

When you have enough completed features, create a release branch:

{% highlight bash %}
git flow update
git flow release start ##release-version##
{% endhighlight %}

Build the code, deploy it into test environments, find bugs.  Fix the bugs directly inside the release branch.  Keep building, deploying, debugging, fixing until you're happy that the release is ready.

When you're ready to tag the release and merge it back into master and develop branches, do this:

{% highlight bash %}
git flow release finish -p ##release-version##
{% endhighlight %}
