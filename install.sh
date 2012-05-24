#! /bin/bash
#
# install.sh
#		Installer script for GitFlow / HubFlow

# is the user running as root?
if [ `id -u` != 0 ]; then
	echo "*** error: must run as root (use sudo!)"
	exit 1
fi

export REPO_NAME="`dirname $0`"
bash $REPO_NAME/contrib/gitflow-installer.sh