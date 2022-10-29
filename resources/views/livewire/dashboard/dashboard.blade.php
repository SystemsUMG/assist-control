<div>
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Centers</p>
                            <h4 class="mb-0">{!! $totalCenters !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Careers</p>
                            <h4 class="mb-0">{!! $totalCareers !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Teachers</p>
                            <h4 class="mb-0">{!! $totalTeachers !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Students</p>
                            <h4 class="mb-0">{!! $totalStudents !!}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-students" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Attendance by date and student</h6>
                        <x-inputs.select
                            name="student"
                        >
                            <option value="" disabled selected>Select a student</option>
                            @forelse($students as $student)
                                <option value="{{ $student->id}}">{!! $student->name !!}</option>
                            @empty
                            @endforelse
                        </x-inputs.select>
                        <hr class="dark horizontal">
                        <button class="btn btn-primary" onclick="calculateStudents()">Consult</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-courses" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Attendance by Date and Course</h6>
                        <div class="row">
                            <div class="col-4">
                                <x-inputs.date
                                    name="start_date"
                                    label="Start Date"
                                ></x-inputs.date>
                            </div>
                            <div class="col-4">
                                <x-inputs.date
                                    name="end_date"
                                    label="End Date"
                                >
                                </x-inputs.date>
                            </div>
                            <div class="col-4">
                                <x-inputs.select
                                    name="course_id"
                                >
                                    <option value="" disabled selected>Select a course</option>
                                    @forelse($courses as $course)
                                        <option value="{{ $course->id}}">{!! $course->name !!}</option>
                                    @empty
                                    @endforelse
                                </x-inputs.select>
                            </div>
                            <hr class="dark horizontal">
                            <button class="btn btn-primary" onclick="calculateCourses()">Consult</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4 mb-3">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Completed Tasks</h6>
                        <p class="text-sm ">Last Campaign Performance</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4 mb-3">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Completed Tasks</h6>
                        <p class="text-sm ">Last Campaign Performance</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('js')
    <script>

        function calculateStudents() {
            let ctx = document.getElementById("chart-students").getContext("2d");
            if (window.graph) {
                window.graph.clear();
                window.graph.destroy();
            }
            let student_id = document.getElementById("student").value
            if (student_id) {
                axios.get('{{ route('report-student') }}', {
                    params: {
                        student_id: student_id
                    }
                })
                    .then(function (response) {
                        window.graph = new Chart(ctx, {
                            type: "bar",
                            data: {
                                datasets: [{
                                    label: "Assistances",
                                    tension: 0.4,
                                    borderWidth: 0,
                                    borderRadius: 4,
                                    borderSkipped: false,
                                    backgroundColor: "rgba(255, 255, 255, .8)",
                                    data: response.data,
                                    maxBarThickness: 6
                                },],
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false,
                                    }
                                },
                                interaction: {
                                    intersect: false,
                                    mode: 'index',
                                },
                                scales: {
                                    y: {
                                        grid: {
                                            drawBorder: false,
                                            display: true,
                                            drawOnChartArea: true,
                                            drawTicks: false,
                                            borderDash: [5, 5],
                                            color: 'rgba(255, 255, 255, .2)'
                                        },
                                        ticks: {
                                            suggestedMin: 0,
                                            suggestedMax: 500,
                                            beginAtZero: true,
                                            padding: 10,
                                            font: {
                                                size: 14,
                                                weight: 300,
                                                family: "Roboto",
                                                style: 'normal',
                                                lineHeight: 2
                                            },
                                            color: "#fff"
                                        },
                                    },
                                    x: {
                                        grid: {
                                            drawBorder: false,
                                            display: true,
                                            drawOnChartArea: true,
                                            drawTicks: false,
                                            borderDash: [5, 5],
                                            color: 'rgba(255, 255, 255, .2)'
                                        },
                                        ticks: {
                                            display: true,
                                            color: '#f8f9fa',
                                            padding: 10,
                                            font: {
                                                size: 14,
                                                weight: 300,
                                                family: "Roboto",
                                                style: 'normal',
                                                lineHeight: 2
                                            },
                                        }
                                    },
                                },
                            },
                        });
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }

        function calculateCourses() {
            let ctx2 = document.getElementById("chart-courses").getContext("2d");
            if (window.graph_courses) {
                window.graph_courses.clear();
                window.graph_courses.destroy();
            }
            let start_date = document.getElementById("start_date").value
            let end_date = document.getElementById("end_date").value
            let course_id = document.getElementById("course_id").value
            if (course_id && start_date && end_date) {
                axios.get('{{ route('report-courses') }}', {
                    params: {
                        start_date: start_date,
                        end_date: end_date,
                        course_id: course_id
                    }
                })
                    .then(function (response) {
                        window.graph_courses = new Chart(ctx2, {
                            type: "line",
                            data: {
                                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                datasets: [{
                                    label: "Mobile apps",
                                    tension: 0,
                                    borderWidth: 0,
                                    pointRadius: 5,
                                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                                    pointBorderColor: "transparent",
                                    borderColor: "rgba(255, 255, 255, .8)",
                                    borderColor: "rgba(255, 255, 255, .8)",
                                    borderWidth: 4,
                                    backgroundColor: "transparent",
                                    fill: true,
                                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                                    maxBarThickness: 6

                                }],
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false,
                                    }
                                },
                                interaction: {
                                    intersect: false,
                                    mode: 'index',
                                },
                                scales: {
                                    y: {
                                        grid: {
                                            drawBorder: false,
                                            display: true,
                                            drawOnChartArea: true,
                                            drawTicks: false,
                                            borderDash: [5, 5],
                                            color: 'rgba(255, 255, 255, .2)'
                                        },
                                        ticks: {
                                            display: true,
                                            color: '#f8f9fa',
                                            padding: 10,
                                            font: {
                                                size: 14,
                                                weight: 300,
                                                family: "Roboto",
                                                style: 'normal',
                                                lineHeight: 2
                                            },
                                        }
                                    },
                                    x: {
                                        grid: {
                                            drawBorder: false,
                                            display: false,
                                            drawOnChartArea: false,
                                            drawTicks: false,
                                            borderDash: [5, 5]
                                        },
                                        ticks: {
                                            display: true,
                                            color: '#f8f9fa',
                                            padding: 10,
                                            font: {
                                                size: 14,
                                                weight: 300,
                                                family: "Roboto",
                                                style: 'normal',
                                                lineHeight: 2
                                            },
                                        }
                                    },
                                },
                            },
                        });
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }


        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

    </script>
@endpush
