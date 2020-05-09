@extends('layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="#" class="btn btn-primary" role="button"><i class="fa fa-file-export"></i> Export</a>
                        <a href="#" class="btn btn-success" role="button"><i class="fa fa-print"></i> Print</a>
                    </div>
                    <h5 class="mt-1">Attendance Log</h5>
                </div>
                <div class="card-body">

                    <div class="float-right">
                        <form class="form-inline">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="text" class="form-control" placeholder="search...">
                            </div>
                        </form>
                    </div>

                <form class="form-inline">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Month: </label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected>May</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                    <button type="submit" class="btn btn-primary my-1"><i class="fa fa-filter"></i> Filter</button>
                    </form>
                    
                    <table class="table mt-3">
                        <thead>
                            <th>Date</th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Time-In</th>
                            <th>Time-Out</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>5/4/2020</td>
                                <td>Dan Avergonzado</td>
                                <td>0722</td>
                                <td>8:30 AM</td>
                                <td>6:30 PM</td>
                            </tr>
                            <tr>
                                <td>5/4/2020</td>
                                <td>Junell Dosdos</td>
                                <td>0835</td>
                                <td>8:03 AM</td>
                                <td>6:40 PM</td>
                            </tr>
                            <tr>
                                <td>5/4/2020</td>
                                <td>Dennis Buyco</td>
                                <td>0921</td>
                                <td>7:34 AM</td>
                                <td>5:17 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection