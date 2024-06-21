@extends('Pages.Admin.AdminLayout.AdminLayout')
@section('content')
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>Register an Instructor</h2>
                <small class="text-muted">Enter the required fields.</small>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>Instructor Information</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="REG_InstructorName" id="REG_InstructorName" class="form-control" placeholder="Name">
                                </div>
                                <span class="text-danger" id="error_name"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <label for="inputGroupFile01" class="form-label">Profile Image</label>
                                <input type="file" class="form-control input-group col-cyan" id="inputGroupFile01" accept=".jpg, .jpeg, .png">
                            </div>
                            <span class="text-danger" id="error_profile_image"></span>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="REG_InstructorMobile" id="REG_InstructorMobile" class="form-control" placeholder="Mobile">
                                </div>
                                <span class="text-danger" id="error_mobile"></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="REG_InstructorEmail" id="REG_InstructorEmail" class="form-control" placeholder="Email">
                                </div>
                                <span class="text-danger" id="error_email"></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="REG_InstructorNic" id="REG_InstructorNic" class="form-control" placeholder="NIC">
                                </div>
                                <span class="text-danger" id="error_nic"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="REG_InstructorBio" id="REG_InstructorBio" placeholder="Instructor Bio"></textarea>
                                </div>
                                <span class="text-danger" id="error_bio"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" onclick="DO_RegisterNewInstructor();" class="btn btn-raised g-bg-cgreen">Submit</button>
                            <button type="submit" class="btn btn-raised btn-default">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
