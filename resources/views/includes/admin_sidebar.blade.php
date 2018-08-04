<?php
/**
 * Created by PhpStorm.
 * User: rachmann
 * Date: 5/25/18
 * Time: 1:05 PM
 */
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/admin/profile.png') }}" class="img-circle" alt="Admin Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name  }}</p>
                <a href="#"><i class="fa fa-circle" style="color:mediumspringgreen;"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="/admin/dashboard" class="active"><i class="fa fa-dashboard text-yellow"></i> <span>Dashboard Home</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Statistics</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                </ul>
            </li>

            <li class="header text-yellow">ACCESSORIES AND DOCUMENTS</li>
            <li><a href="/admin/gallery"><i class="fa fa-picture-o text-yellow"></i> Gallery</a></li>
            <li><a href="/admin/docs"><i class="fa fa-file-pdf-o text-yellow"></i> Documents</a></li>
            <li><a href="/admin/video"><i class="fa fa-video-camera text-yellow"></i> Videos</a></li>

             <li class="header text-blue">BLOGGING AND POSTS</li>
        <li><a href="/admin/posts" class="active"><i class="fa fa-bookmark text-blue"></i> <span> Posts</span></a></li>

            <li class="header text-green">COURSES AND EDUCATION</li>
              <li><a href="/admin/courses"><i class="fa fa-book text-green"></i> View Courses</a></li>

            <li class="header text-maroon"> MISCELLANEOUS</li>
                <li><a href="/admin/tags" class="active"><i class="fa fa-tags text-maroon"></i> <span> Tags</span></a></li>
                <li><a href="/admin/categories" class="active"><i class="fa fa-th text-maroon"></i> <span> Categories</span></a></li>

            <li class="header text-fuchsia"> EVENTS AND SEMINARS</li>
                <li><a href="/admin/events" class="active"><i class="fa fa-map-signs text-fuchsia"></i> <span> Events</span></a></li>

            <li class="header text-blue"> MEMBERSHIP PROFILES</li>
            <li><a href="/admin/team"><i class="fa fa-users text-blue"></i> View Team</a></li>
            <li><a href="/admin/users"><i class="fa fa-users text-blue"></i> View Users</a></li>

            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

