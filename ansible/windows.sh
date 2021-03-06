#!/usr/bin/env bash

# Update Repositories

# Add Ansible Repository & Install Ansible
sudo add-apt-repository -y ppa:ansible/ansible
sudo apt-get update
sudo apt-get install -y software-properties-common ansible git

# Setup Ansible for Local Use and Run
cp /vagrant/ansible/inventories/dev /etc/ansible/hosts -f
chmod 666 /etc/ansible/hosts
cat /vagrant/ansible/files/authorized_keys >> /home/vagrant/.ssh/authorized_keys

#Galaxy roles installation
sudo ansible-galaxy install -r /vagrant/ansible/install_roles.yml

sudo ansible-playbook /vagrant/ansible/playbook.yml -e hostname=$1 --connection=local -v