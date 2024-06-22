//Instructor Data Table Load
$('#instructorTable').DataTable({
    dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
        '<"row"<"col-sm-12"tr>>' +
        '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    responsive: true
})

//Students Data Table Load
$('#studentTable').DataTable({
    dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
        '<"row"<"col-sm-12"tr>>' +
        '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    responsive: true
})

//Students Data Table Load
$('#studentDataTable').DataTable({
    dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
        '<"row"<"col-sm-12"tr>>' +
        '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    buttons: [
        'copy',
        'csv',
        'excel',
        {
            extend: 'pdfHtml5',
            customize: function (doc) {
                // Customization options
                doc.content[1].table.widths = [
                    '20%',
                    '20%',
                    '20%',
                    '20%',
                    '20%'
                ] // Adjust column widths
                doc.styles.tableHeader.fillColor = '#f2f2f2' // Change table header background color
                doc.styles.tableHeader.color = '#000000' // Change table header text color
                doc.styles.tableHeader.alignment = 'center' // Center align table header text

                // Add footer text
                doc.content.push({
                    text: 'Custom footer text here',
                    margin: [0, 30, 0, 0] // Adjust margin (left, top, right, bottom)
                })

                // Add header text
                doc['header'] = function () {
                    return {
                        columns: [{
                            text: 'Custom Header Text',
                            alignment: 'left',
                            margin: [10, 10]
                        }],
                        margin: 20
                    }
                }
            }
        },
        'print'
    ],
    responsive: true
})

//OPEN EDIT INSTRUCTOR MODEL WITH DATA LOADING
const OPEN_EditInstructorModel = instructorId => {
    $.ajax({
        url: `${BASE_URL}api/getInstructor/${instructorId}`,
        type: 'POST',
        success: function (InstructorData) {
            $('#EDIT_InstructorName').val(InstructorData.name)
            $('#EDIT_InstructorMobile').val(InstructorData.mobile)
            $('#EDIT_InstructorEmail').val(InstructorData.email)
            $('#EDIT_InstructorId').text(InstructorData.iocl_id)
            $('#EDIT_InstructorBio').val(InstructorData.bio)
            $('#EDIT_INSTRUCTORMODAL').modal().show()
        },
        error: function (error) {
            console.log(error)
        }
    })
}

//UPDATE INSTRUCTOR
const DO_UpdateInstructor = () => {
    let instructor_id = $('#EDIT_InstructorId').text()
    let instructor_name = $('#EDIT_InstructorName').val()
    let instructor_mobile = $('#EDIT_InstructorMobile').val()
    let instructor_email = $('#EDIT_InstructorEmail').val()
    let instructor_bio = $('#EDIT_InstructorBio').val()

    Swal.fire({
        title: 'Are you sure,',
        text: 'You want to Update Instructor?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then(isConfirm => {
        if (isConfirm) {
            $.ajax({
                url: `${BASE_URL}api/updateInstructor`,
                type: 'POST',
                data: {
                    instructor_id: instructor_id,
                    instructor_name: instructor_name,
                    instructor_mobile: instructor_mobile,
                    instructor_email: instructor_email,
                    instructor_bio: instructor_bio
                },
                success: function (response) {
                    if (response.message == 'success') {
                        swal.fire({
                            title: 'Done',
                            text: 'successfully Updated Instructor!',
                            icon: 'success',
                            buttons: false,
                            timer: 1200
                        })
                        //response actions...
                        setTimeout(function () {
                            $('#updModal_CloseBtn').click()
                            window.location.reload()
                        }, 1500)
                    } else {
                        swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            buttons: false,
                            timer: 1200
                        })
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
    })
}

//DEACTIVATE OR ACTIVE INSTRUCTOR
const DO_DeleteInstructor = instructor_id => {
    swal.fire({
        title: 'Are you sure,',
        text: 'You want to Update Instructor?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${BASE_URL}api/deleteInstructor`,
                type: 'POST',
                data: {
                    instructor_id: instructor_id
                },
                success: function (response) {
                    if (response.message == 'success') {
                        swal.fire({
                            title: 'Done',
                            text: response.text,
                            icon: 'success',
                            buttons: false,
                            timer: 1200
                        })
                        //response actions...
                        setTimeout(function () {
                            window.location.reload()
                        }, 1500)
                    } else {
                        swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            buttons: false,
                            timer: 1200
                        })
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }
    })
}

//REGISTER NEW INSTRUCTOR

const DO_RegisterNewInstructor = () => {
    let formData = new FormData()
    formData.append('name', document.getElementById('REG_InstructorName').value)
    formData.append(
        'mobile',
        document.getElementById('REG_InstructorMobile').value
    )
    formData.append(
        'email',
        document.getElementById('REG_InstructorEmail').value
    )
    formData.append('nic', document.getElementById('REG_InstructorNic').value)
    formData.append('bio', document.getElementById('REG_InstructorBio').value)
    formData.append(
        'profile_image',
        document.getElementById('inputGroupFile01').files[0]
    )

    $.ajax({
        url: `${BASE_URL}api/instructor/store`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.message == 'success') {
                swal.fire({
                    title: 'Done',
                    text: 'Instructor Registered Successfully!',
                    icon: 'success',
                    buttons: false,
                    timer: 1200
                })
                //response actions...
                setTimeout(function () {
                    window.location.reload()
                }, 1500)
            } else {
                swal.fire({
                    title: 'Error',
                    text: response.message,
                    icon: 'error',
                    buttons: false,
                    timer: 1200
                })
            }
        },
        error: function (xhr) {
            let errors = xhr.responseJSON.errors
            console.log('ERROR RESPONSE :' + errors)
            // Clear previous errors
            document.getElementById('error_name').innerText = ''
            document.getElementById('error_mobile').innerText = ''
            document.getElementById('error_email').innerText = ''
            document.getElementById('error_nic').innerText = ''
            document.getElementById('error_bio').innerText = ''
            document.getElementById('error_profile_image').innerText = ''

            // Show new errors
            if (errors.name) {
                document.getElementById('error_name').innerText = errors.name[0]
            }
            if (errors.mobile) {
                document.getElementById('error_mobile').innerText =
                    errors.mobile[0]
            }
            if (errors.email) {
                document.getElementById('error_email').innerText =
                    errors.email[0]
            }
            if (errors.nic) {
                document.getElementById('error_nic').innerText = errors.nic[0]
            }
            if (errors.bio) {
                document.getElementById('error_bio').innerText = errors.bio[0]
            }
            if (errors.profile_image) {
                document.getElementById('error_profile_image').innerText =
                    errors.profile_image[0]
            }
        }
    })
}

//OPEN EDIT STUDENT MODEL WITH DATA LOADING
const DO_ViewStudent = IOCL_ID => {
    $.ajax({
        url: `${BASE_URL}api/getStudent/${IOCL_ID}`,
        type: 'POST',
        success: function (StudentData) {
            function checkData(data) {
                return data ? data : 'N/A'
            }

            function checkDate(data) {
                return data ? formatDate(data) : 'N/A'
            }

            $('#STD_IoclID').text(checkData(StudentData.iocl_id))
            $('#STD_Mobile').text(checkData(StudentData.mobile_no))
            $('#STD_Name').text(
                `${checkData(StudentData.firstName)} ${checkData(
                    StudentData.lastName
                )}`
            )
            $('#STD_Email').text(checkData(StudentData.email))
            $('#STD_UpdateTime').text(checkDate(StudentData.updated_at))

            // Check if student_details and address_line_1 exist
            if (StudentData.student_details) {
                $('#STD_AddressLineOne').text(
                    checkData(StudentData.student_details.address_line_1)
                )
                $('#STD_AddressLineTwo').text(
                    checkData(StudentData.student_details.address_line_2)
                )
                $('#STD_AddressLineThree').text(
                    checkData(StudentData.student_details.address_line_3)
                )

                // Check if city exists within student_details
                if (StudentData.student_details.city) {
                    $('#STD_City').text(
                        checkData(StudentData.student_details.city.name)
                    )
                } else {
                    $('#STD_City').text('N/A')
                }
            } else {
                $('#STD_AddressLineOne').text('N/A')
                $('#STD_AddressLineTwo').text('N/A')
                $('#STD_AddressLineThree').text('N/A')
                $('#STD_City').text('N/A')
            }

            // Uncomment and handle profile image if needed
            // if (StudentData.profile_image) {
            //     $("#VIEW_StudentImage").attr('src', `${BASE_URL}storage/${StudentData.profile_image}`);
            // } else {
            //     $("#VIEW_StudentImage").attr('src', 'path/to/default/image.jpg'); // Provide a default image path
            // }

            $('#VIEWSTUDENTMODAL').modal().show()
            console.log(StudentData)
        },
        error: function (error) {
            console.log(error)
        }
    })
}

function formatDate(dateString) {
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    }
    return new Date(dateString).toLocaleDateString(undefined, options)
}

const DO_CourseStateChange = course_no => {
    $.ajax({
        url: `${BASE_URL}api/course/stateChange`,
        type: 'POST',
        data: {
            course_no: course_no
        },
        success: function (response) {
            console.log(response)
            if (response.message == 'success') {
                swal.fire({
                    title: 'Done',
                    text: response.text,
                    icon: 'success',
                    buttons: false,
                    timer: 1200
                })
                //response actions...
                setTimeout(function () {
                    window.location.reload()
                }, 1500)
            } else {
                swal.fire({
                    title: 'Error',
                    text: response.message,
                    icon: 'error',
                    buttons: false,
                    timer: 1200
                })
            }
        },
        error: function (error) {
            console.log(error)
        }
    })
}

let player = videojs('my-video')
player.addClass('vjs-matrix')

//Load Course Details
function loadCourseDetails() {
    let course_id = $('#selectedCourseID').val()
    console.log(course_id)
    $.ajax({
        url: `${BASE_URL}api/getCourseDetails/${course_id}`,
        type: 'POST',
        success: function (response) {
            console.log(response.course)

            $('#videoCount').text(response.course.videoCount)
            $('#course_title').val(response.course.title)
            $('#course_description').val(response.course.description)
            $('#course_category').val(response.course.category_id)
            $('#course_price').val(`Rs.${response.course.total_price}.00`)

            $('#studentCount').text(response.course.studentCount)
            $('#materialCount').text(response.course.courseMaterialCount)
            $('#earnedCount').text(`Rs.${response.course.totalEarned}.00`)

            $('#loadButtons').html('')
            $('#loadButtons')
                .html(`<button class="btn btn-raised btn-primary" onclick="addCourseVideo('${response.course.course_no}')">Add Videos</button>
                 <button class="btn btn-raised btn-primary" onclick="loadCourseMaterials(${course_id})">Add Materials</button>`)

            $('#courseInstructor').text(response.course.instructor.name)
            console.log(response.course.videos)
            //Load Videos in html page
            let videoHtml = ''
            let timeline = document.getElementById('timeline')
            timeline.innerHTML = ''
            response.course.videos.forEach(video => {
                videoHtml += `
                <div class="timeline-item">
                      <div class="item-content p-2">
                        <div class="panel">
                          <div class="panel-heading p-2" role="tab" id="headingOne_1" style="background-color: #0a58ca">
                             <a style="text-decoration: none;font-weight: 600" role="button" class="p-2 text-white panel-title h6"
                               data-toggle="collapse" href="#collapse${video.id}" aria-expanded="true" aria-controls="collapseOne_1">${video.video_title}
                             </a>
                          </div>
                          <div id="collapse${video.id}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                             <div class="panel-body p-3">
                               <div class="col-12">
                                  <div class="row">
                                       <button onclick="LOAD_VIDEO('${video.video_path}')" class="btn bg-blue-grey col-12 p-1 my-3">
                                           LOAD VIDEO
                                       </button>
                                       <div class="col-12 col-md-6">
                                                                       <p>${video.video_description}</p>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <hr>
                              <div class="col-12">
                                  <div class="row">
                                      <div class="col-6">
                                           <button class="btn btn-raised btn-primary">
                                               Edit
                                           </button>
                                       </div>
                                       <div class="col-6">
                                           <button class="btn btn-raised btn-danger">
                                               Delete
                                           </button>
                                       </div>
                                   </div>
                               </div>
                             </div>
                          </div>
                        </div>
                      </div>
                </div>
                                        `;
                timeline.innerHTML = videoHtml
            })
        },
        error: function (error) {
            console.log(error)
        }
    })
}

//Load Video
function LOAD_VIDEO(video_url) {
    let videoPath = `${BASE_URL + video_url}`

    var player = videojs('videoPlayer')
    var videoSource = player.src({type: 'video/mp4', src: videoPath})

    player.src(videoSource)
    player.load()
    player.play()
    $('#VIEW_VIDEOMODAL').modal().show()
}

function addCourseVideo(course) {
    $("#loadCourseID").text(course);
    $("#courseIDInput").val(course);
    $('#ADD_VIDEO_MODAL').modal().show()
}

function uploadCourseVideo() {
    let course_id = $('#courseIDInput').val()
    let video_title = $('#videoTitle').val()
    let video_description = $('#videoDescription').val()
    let video_file = $('#videoFile').prop('files')[0]

    //Validation before ajax
    if (video_title == '') {
        swal.fire({
            title: 'Error',
            text: 'Please enter Video Title',
            icon: 'error',
            buttons: false,
            timer: 1200
        })
        return
    }
    if (video_description == '') {
        swal.fire({
            title: 'Error',
            text: 'Please enter Video Description',
            icon: 'error',
            buttons: false,
            timer: 1200
        })
        return
    }
    if (video_file == undefined) {
        swal.fire({
            title: 'Error',
            text: 'Please select Video File',
            icon: 'error',
            buttons: false,
            timer: 1200
        })
        return
    }
    let formData = new FormData()
    formData.append('course_id', course_id)
    formData.append('video_title', video_title)
    formData.append('video_description', video_description)
    formData.append('video_file', video_file)

    $.ajax({
        url: `${BASE_URL}api/course/addVideo`,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response)
            if (response.message == 'success') {
                swal.fire({
                    title: 'Done',
                    text: 'Video Added Successfully!',
                    icon: 'success',
                    buttons: false,
                    timer: 1200
                })
                //response actions...
                setTimeout(function () {
                    $('#courseIDInput').text("")
                    $('#videoTitle').val("")
                    $('#videoDescription').val("")
                    $('#videoFile').val("")
                    $('#ADD_VIDEO_MODAL').modal().hide()
                    loadCourseDetails()
                }, 1500)
            } else {
                swal.fire({
                    title: 'Error',
                    text: response.message,
                    icon: 'error',
                    buttons: false,
                    timer: 1200
                })
            }
        },
        error: function (error) {
            console.log(error)
        }
    })

}
