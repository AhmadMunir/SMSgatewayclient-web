<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="<?php echo base_url().'Home' ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-filter fa-fw"></i> Pulsa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url().'Home/pulsa/Im3' ?>">Indosat</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'Home/pulsa/Telkomsel' ?>">Telkomsel</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'Home/pulsa/Axis' ?>">Axis</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'Home/pulsa/Xl' ?>">XL</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'Home/pulsa/Tri' ?>">3</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Paket Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Indosat</a>
                                </li>
                                <li>
                                    <a href="morris.html">Telkomsel</a>
                                </li>
                                <li>
                                    <a href="morris.html">Axis</a>
                                </li>
                                <li>
                                    <a href="morris.html">XL</a>
                                </li>
                                <li>
                                    <a href="morris.html">3</a>
                                </li>
                                <li>
                                    <a href="morris.html">Smartfreen</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Laporan Transaksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url().'Home/laporan' ?>">Pulsa</a>
                                </li>
                                <li>
                                    <a href="morris.html">Paket Data</a>
                                </li>
                            </ul>
                        </li>
                        <label for="log">Log</label> <br/>
                        <textarea id="log" cols="24" rows="5"></textarea> <br/>
                        <style>
                          textarea{
                            resize: none;
                            margin-left: 5px;
                          }
                          input{
                            width: 500px;
                          }
                        </style>
