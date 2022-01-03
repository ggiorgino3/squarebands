#!/bin/bash
echo ""
echo ""
echo ""
echo ""
echo "###################################################################";
echo "#                                                                 #"
echo "#  Running installation of third part dependencies with Composer  #";
echo "#                                                                 #"
echo "###################################################################";
sleep 2;
composer i
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
npm i
echo ""
echo ""
echo ""
echo ""
echo "#######################################################################";
echo "#                                                                     #"
echo "#          Compiling all the assets that need to build...             #";
echo "#                                                                     #"
echo "#######################################################################";
echo ""
sleep 2
npm run dev
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

sail artisan migrate
