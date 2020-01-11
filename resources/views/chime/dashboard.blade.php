<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Chime Banking - No Hidden Fees. Grow Your Savings Automatically.</title>
      <link rel="shortcut icon" href="{{ asset('chime/favicon.png')}}" type="image/x-icon">

      <link rel="stylesheet" href="{{ asset('chime/styles.css')}}">
      <link rel="stylesheet" href="{{ asset('chime/foundation.css')}}">
      <link rel="stylesheet" href="{{ asset('chime/hamburgers.css')}}">
      <link rel="stylesheet" href="{{ asset('chime/fontawesome.css')}}">

  </head>
  <body class="ng-scope" ng-app="ExoApp" data-gr-c-s-loaded="true" data-whatinput="mouse">
      <div class="global-view ng-scope" ui-view="">
          <div class="dashboard ng-scope">
              <div class="hide-for-print top-header">
                <div class="row">
                    <div class="small-6 columns">
                        <a href="https://www.chimebank.com/" class="float-left" >
                        <img src="{{ asset('chime/img/chime-logo.svg')}}" width="101" height="27"></a>
                    </div>
                    <div class="small-6 columns">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off" ></i>&nbsp;{{ __('Logout') }}
                        </a>
                      <!-- <button ng-click="model.logout()" class=" icon-button float-right">
                          <i class="fas fa-power-off" ></i>&nbsp;Logout
                      </button> -->
                    </div>
                </div>
              </div>
              <header hide-offset="0" hide-header="" class="hide-for-print main-header" style="top: 0px; transition: all 0.25s ease 0s;">
                  <div class="main-nav">                        
                    <div class="container">
                      <div class="row">
                        <div class="large-4 medium-4 small-6 columns">
                          <p class="greet ng-binding">
                              Hi, Iloba
                            <span><a href="#">View profile <i class="fa fa-chevron-right"></i></a></span> 
                          </p>            
                        </div>
                        <div class="large-8 medium-8 small-6 columns">
                          <div class="navicons">
                            <ul>
                              <li ng-repeat="item in model.dashboardMenu | menu:model.role_flag:model.session" class="ng-scope">
                                <a href="#"><img class="dashboardImg" src="{{ asset('chime/img/home.png')}}">
                                  <span class="ng-binding">Dashboard</span>
                                </a>
                              </li>
                              <li ng-repeat="item in model.dashboardMenu | menu:model.role_flag:model.session" class="ng-scope">
                                  <a ng-click="model.show(item.modal ?'modal':'page',item.href)">
                                    <img ng-src="img/transfer@2x.png" class="dashboardImg" src="{{ asset('chime/img/transfer@2x.png')}}">
                                    <span class="ng-binding">Do a Transfer</span>
                                  </a>
                              </li>
                              
                              <li ng-repeat="item in model.dashboardMenu | menu:model.role_flag:model.session" class="ng-scope">
                                  <a ng-click="model.show(item.modal ?'modal':'page',item.href)">
                                    <img ng-src="img/airtime@2x.png" class="dashboardImg" src="{{ asset('chime/img/airtime@2x.png')}}">
                                    <span class="ng-binding">Buy Airtime</span>
                                  </a>
                              </li>
                              <li ng-repeat="item in model.dashboardMenu | menu:model.role_flag:model.session" class="ng-scope">
                                  <a ng-click="model.show(item.modal ?'modal':'page',item.href)">
                                    <img ng-src="img/bills@2x.png" class="dashboardImg" src="{{ asset('chime/img/bills@2x.png')}}">
                                    <span class="ng-binding">Bills and payment</span>
                                  </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <button class="hamburger hamburger--collapse" type="button">
                          <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                          </span>
                        </button>
                      </div>
                    </div>
                  </div>
              </header>

              <div class="main-content-wrapper" style="opacity: 1; margin-top: 147px; transition: opacity 0.05s 
                  ease 0.2s, margin-top 0.2s ease-in 0s;" resizer="" offset-elements="['.main-header']">
                  <div ui-view="content" class="main-content ng-scope">
                  <div class="dash-body ng-scope">
                      <div class="container">
                        <div class="row">
                          <div class="columns small-12">
                            <div model="model" class="ng-isolate-scope">
                              </div>
                          </div>
                        </div>
                        <div class="row">
                          <div no-of-columns="2" grid="model.bricks">
                            <div class="row column">
                              <ng-repeat class="ng-scope" >
                                <div ng-if="!item.override" class="ng-scope columns no-override large-6 medium-6 small-12">
                            <content-item template="card.template" class="ng-scope">      
                            <div class="dash-section account-card ng-scope">
                              <div class="section-title palette-9">
                                <p class="ng-binding">Savings ACCOUNT <span class="ng-binding">&nbsp;6233907973</span></p>        
                              </div>
                              <div class="amt-graph clearfix">
                              <p class="account-name">
                                <ng-bind-html class="ng-binding">ILOBA ISRAEL IFECHUKWUBE</ng-bind-html>
                              </p>
                                <div class="bank-bal">
                                <p class="avail-bal ng-scope">Available Balance</p> 
                                <p class="avail-bal-amt ">
                                  <ng-bind-html class="ng-binding">₦1,325.73</ng-bind-html></p>
                                  <a class="logout">View account details <i class="fa fa-chevron-right"></i></a>
                                </div>  
                                <div class="other-bank-det">
                                <p class="ng-scope">Cleared Balance <span>
                                  <ng-bind-html class="ng-binding">₦2,325.73</ng-bind-html></span></p>
                                  <p>Status <span class="ng-binding">Active</span></p>
                                </div>    
                              </div>
                              <div class="section-footer">
                                <ul class="dropdown menu" data-dropdown-menu="">
                                  <li><a ng-click="model.showAccountInfo(account.accountNo)">Account officer</a></li>
                                  <li  class="ng-scope"><a class="ng-binding">Transfer Funds</a></li>
                                  <li class="ng-scope">
                                    <a  class="ng-binding">Buy Airtime</a></li>
                                    <li class="ng-scope"> <a class="ng-binding">Pay bills &nbsp;<i class="fa fa-caret-down"></i></a></li>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </content-item>
                          </div>
                          </ng-repeat><ng-repeat class="ng-scope">
                              <div class="ng-scope columns no-override large-6 medium-6 small-12">
                                <content-item template="card.template" class="ng-scope">
                                  <div class="dash-section account-card ng-scope" style="background-image: url(chime/img/cal-1-mobile.png); 
                                    background-size: 100% 100%; background-repeat: no-repeat;">
                                  </div>
                                </content-item>
                              </div>
                          </ng-repeat>
                          <ng-repeat class="ng-scope override">
                              <content-item template="card.template" class="ng-scope">
                                <div class="columns ng-scope small-12">
                                  <div class="dash-section transact-ctn account-card">
                                    <h4 class="logout">Recent Transactions</h4>
                                    <div class="section-title">
                                      <ul>
                                        <li class="width-10">Date</li>
                                        <li class="width-20">Transaction Type</li>
                                        <li class="width-15">Account</li>
                                        <li class="width-10">Amount</li>
                                        <li class="width-10">Status</li>
                                        <li class="width-20">Description</li>
                                        <li class="width-10">Charges</li>
                                      </ul>
                                    </div>

                                    <div class="transactions-listing">
                                      <div ng-repeat="trans in card.result" class="list ng-scope">
                                        <ul>
                                          <li class="ng-binding width-10"><span>Date</span>7-Jan-20</li>
                                          <li class="ng-binding width-20"><span>Type</span>INTERTRANSFER</li>
                                          <li class="ng-binding width-15"><span>Account</span>6233907973</li>
                                          <li class="width-10"><span>Amount</span>₦5,000.00</ng-bind-html></li>
                                          <li class="ng-binding width-10"><span>Status</span>Successful</li> 
                                          <li class="width-20"><span>Description</span>
                                            <p class="ng-binding">ONB TRANSFER TO IDUH PETER **0705 GTB Dash</p>
                                          </li>
                                          <li class="width-10"><span>Charges</span>
                                            <ng-bind-html class="ng-binding">₦10.50</ng-bind-html>
                                          </li>   
                                        </ul>
                                      </div>
                                      <a href="#" class="notify ng-scope logout">View all transactions <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                              </content-item>
                          </ng-repeat>
                        </div>
                      </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </body>
</html>