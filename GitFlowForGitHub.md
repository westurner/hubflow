---
layout: default
title: Using GitFlow With GitHub
---
# Using GitFlow With GitHub #

## Introduction ##

This is our recommended workflow for using:

* [The GitFlow branching model](http://nvie.com/posts/a-successful-git-branching-model/)
* \+ [our fork of the GitFlow tools](https://github.com/datasift/gitflow)
* \+ [https://github.com](GitHub)

together.  We're assuming you've already looked at stock GitFlow.  If you haven't, please first read:

* [GitFlow](http://nvie.com/posts/a-successful-git-branching-model/)
* [Introducing GitFlow](http://datasift.github.com/gitflow/IntroducingGitFlow.html)

## The Poster ##

![GitFlow For GitHub](GitFlowWorkflowNoFork.png)

## 1. Cloning A Repo ##

Clone the existing repo from GitHub:

{% highlight bash %}
git clone git@github.com:##orgname##/##reponame##
{% endhighlight %}

<p><span class="label label-important">Please remember:</span></p>

* Do not fork the repo on GitHub - clone the master repo directly.

## 2. Initialise GitFlow Tools ##

The GitFlow tools need to be initialised before they can be used:

{% highlight bash %}
git branch master origin/master
git flow init -d
{% endhighlight %}

You have to do this every time you clone a repo.

## 3. Create A Feature Branch ##

If you are creating a new feature branch, do this:

{% highlight bash %}
git flow feature start -F ##feature-name##
{% endhighlight %}

If you are starting to work on an existing feature branch, do this:

{% highlight bash %}
git flow feature checkout ##feature-name##
{% endhighlight %}

## 4. Create Feature Branch On GitHub ##

Push your feature branch back to GitHub to make sure that it exists in the master repo:

{% highlight bash %}
git flow feature publish ##feature-name##
{% endhighlight %}

If the feature branch already exists on the master repo, this command will fail with an error.

## 5. Keep Up To Date ##

{% highlight bash %}
git flow update
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