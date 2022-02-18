#!/bin/bash
echo ""
echo "###################################################################";
echo "#                                                                 #"
echo "#  Running installation of third part dependencies with Composer  #";
echo "#                                                                 #"
echo "###################################################################";
sleep 2;
composer u && composer i
echo ""
echo ""
echo ""
echo ""
echo "#######################################################################";
echo "#                                                                     #"
echo "#  Running installation of FRONTEND third part dependencies with npm  #";
echo "#                                                                     #"
echo "#######################################################################";
sleep 2

./vendor/bin/sail up -d
