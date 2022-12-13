<?php
    $roles = Auth::user()->admin;

    $searchable = array();

    foreach ($roles as $role)
    {
        $searchable[] = $role->type;
    }
?>

<aside class="navigation">
    <nav>
        <ul class="nav luna-nav">
            <li class="nav-category">
                Main
            </li>

            @if(in_array('Admin', $searchable) || in_array('Management', $searchable))
                <li>
                    <a href="#employees" data-toggle="collapse" aria-expanded="false">
                        Employee Management
                    </a>
                    <ul id="employees" class="nav nav-second collapse">
                        <li><a href="{!! url('/system/employee/') !!}"> Employee List</a></li>
                        <li><a href="{!! url('/system/employee/attendance') !!}"> Employee attendance</a></li>
                        <li><a href="{!! url('/system/employee/attendance') !!}"> Assign a leave</a></li>
                        <li><a href="{!! url('/system/employee/attendance') !!}"> Assign a travel allowance</a></li>
                    </ul>
                </li>
            @endif

            <li>
                <a href="#package" data-toggle="collapse" aria-expanded="false">
                    Package Management</span>
                </a>
                <ul id="package" class="nav nav-second collapse">
                    <li><a href="{!! url('/system/package/create') !!}">Add Package</a></li>
                    <li><a href="{!! url('/system/package/') !!}">View Package</a></li>
                </ul>
            </li>
            <li>
                <a href="#customers" data-toggle="collapse" aria-expanded="false">
                    Customer Management</span>
                </a>
                <ul id="customers" class="nav nav-second collapse">
                    <li><a href="{!! url('/system/customer') !!}">Customer</a></li>
                    <li><a href="{!! url('/system/customer/create') !!}">Add Customer</a></li>
                    <li><a href="{!! url('/system/customer/view/') !!}">Customer List</a></li>
                </ul>
            </li>
            <li>
                <a href="#ticket" data-toggle="collapse" aria-expanded="false">
                    Ticket Management</span>
                </a>
                <ul id="ticket" class="nav nav-second collapse">
                    <li><a href="{!! url('/system/ticket') !!}">Ticket</a></li>
                    <li><a href="{!! url('/system/ticket/create') !!}">Add Ticket</a></li>
                </ul>
            </li>
            <li>
                <a href="#agent" data-toggle="collapse" aria-expanded="false">
                    Agent Management</span>
                </a>
                <ul id="agent" class="nav nav-second collapse">
                    <li><a href="{!! url('/system/agent') !!}">Agent</a></li>
                    <li><a href="{!! url('/system/agent/create') !!}">Add Agent</a></li>
                    <li><a href="{!! url('/system/agent/view/') !!}">Agent List</a></li>
                </ul>
            </li>
            <li>
                <a href="#tours" data-toggle="collapse" aria-expanded="false">
                    Tour Management</span>
                </a>
                <ul id="tours" class="nav nav-second collapse">
                    <li><a href="{!! url('/system/tours/create') !!}">Add Tours</a></li>
                    <li><a href="{!! url('/system/tours/') !!}">View all tours</a></li>
                    <li><a href="{!! url('/system/tours/guides/') !!}">View All Guides</a></li>
                    <li><a href="{!! url('/system/tours/guides/create') !!}">Add Guides</a></li>
                    <li><a href="{!! url('/system/tours/hotels/') !!}">View Hotels</a></li>
                    <li><a href="{!! url('/system/tours/hotels/create') !!}">Add Hotels</a></li>
                </ul>
            </li>
            <li>
                <a href="#advertisements" data-toggle="collapse" aria-expanded="false">
                    Advertisements</span>
                </a>
                <ul id="advertisements" class="nav nav-second collapse">
                    <li><a href="{!! url('/system/advertisements') !!}">Advertisements</a></li>
                </ul>
            </li>

            @if(in_array('Admin', $searchable) || in_array('Management', $searchable))
                <li>
                    <a href="#accounts" data-toggle="collapse" aria-expanded="false">
                        Accounts Management
                    </a>

                    <ul id="accounts" class="nav nav-second collapse">
                        <li>
                            <a href="{!! url('/system/accounts/') !!}">Accounts Overview</a>
                        </li>

                        <li>
                            <a href="{!! url('/system/accounts/graphs') !!}">Account graphs</a>
                        </li>
                    </ul>
                </li>
            @endif

            <li>
                <a href="#rental" data-toggle="collapse" aria-expanded="false">Rental Management</a>
            </li>

            <ul id="rental" class="nav nav-second collapse">
                <li><a href="{!! url('/system/rental/') !!}">Rental home</a></li>
                <li><a href="{!! url('/system/rental/reservation') !!}">Reservation Management</a></li>
                <li><a href="{!! url('/system/rental/vehicle') !!}">Vehicle Management</a></li>
                <li><a href="{!! url('/system/rental/driver') !!}">Driver Management</a></li>
            </ul>

        </ul>
    </nav>
</aside>