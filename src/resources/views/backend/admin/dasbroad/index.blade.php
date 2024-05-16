@include('backend.partials.main')

<head>

    @include('backend.partials.title-meta')

    <!--Chartist Chart CSS -->
    <link href="{{ asset('public/backend/assets/libs/chartist/chartist.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- plugin css -->
    <link href="{{ asset('public/backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ asset('public/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />


    @include('backend.partials.head-css')

</head>

@include('backend.partials.body')

<!-- Begin page -->
<div id="layout-wrapper">

    @include('backend.partials.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        @yield('main-content')

        <!-- End Page-content -->


        @include('backend.partials.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('backend.partials.right-sidebar')

@include('backend.partials.vendor-scripts')


<!-- Plugin Js-->
<script src="{{ asset('public/backend/assets/libs/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}">
</script>
<script src="{{ asset('public/backend/assets/libs/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/libs/raphael/raphael.min.js') }}"></script>
<!-- Peity chart-->
<script src="{{ asset('public/backend/assets/libs/peity/jquery.peity.min.js') }}"></script>

<!-- Plugins js-->
<script
src="{{ asset('public/backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
</script>
<script
src="{{ asset('public/backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
</script>

<!-- Required datatable js -->
<script src="{{ asset('public/backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
<script src="{{ asset('public/backend/assets/libs/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/libs/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('public/backend/assets/js/pages/form-repeater.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<script>
    $(function() {
        "use strict";
        var DataLineChart = [];
        async function fetchDumpLineChart() {
            await fetchHandlerLine();
            Morris.Area({
                element: "extra-area-chart",
                data: DataLineChart,
                lineColors: ["#148cca", "#f9b92a"],
                xkey: "Time",
                ykeys: ["Ac", "Tr"],
                labels: ["Active", "Trading"],
                pointSize: 0,
                lineWidth: 0,
                resize: true,
                fillOpacity: .8,
                behaveLikeLine: !0,
                gridLineColor: "rgba(108, 120, 151, 0.2)",
                hideHover: "auto"
            });
        }
        fetchDumpLineChart();

        async function fetchHandlerLine() {
            const response = await fetch('https://yotrip.vn/api/v1/admin/revenue');
            const posts = await response.json();

            const data = posts.data;
            DataLineChart = data;
        }

        Morris.Bar({
            element: "morris-bar-chart",
            data: [{
                y: "Project-1",
                a: 1e4,
                b: 8e3,
                c: 7800
            }, {
                y: "Project-2",
                a: 8500,
                b: 7e3,
                c: 6500
            }, {
                y: "Project-3",
                a: 9e3,
                b: 7500,
                c: 7e3
            }, {
                y: "Project-4",
                a: 9500,
                b: 8500,
                c: 7500
            }, {
                y: "Project-5",
                a: 7500,
                b: 5500,
                c: 5e3
            }],
            barGap: 8,
            barSizeRatio: .3,
            barShape: "soft",
            barRadius: [5, 5, 5, 5],
            xkey: "y",
            ykeys: ["a", "b", "c"],
            labels: ["Total", "Used", "Target"],
            barColors: ["#44a2d2", "#98d4ce", "#c1d1de"],
            hideHover: "auto",
            preUnits: "$",
            gridLineColor: "rgba(108, 120, 151, 0.2)",
            resize: !0
        }), $(".knob").knob({
            format: function(e) {
                return e + "%"
            }
        }), $(".knob").each(function() {
            var e = $(this),
                a = e.attr("rel");
            e.knob(), $({
                value: 0
            }).animate({
                value: a
            }, {
                duration: 2e3,
                easing: "swing",
                step: function() {
                    e.val(Math.ceil(this.value)).trigger("change")
                }
            })
        }), $(".live-tile, .flip-list").not(".exclude").liveTile(), Morris.Donut({
            element: "donut-example",
            data: [{
                label: "Người dùng",
                value: <?= $users_count ?? 0 ?>,
            }, {
                label: "Đơn đặt",
                value: <?= $booking_count ?? 0 ?>,
            }, {
                label: "Xe",
                value: <?= $cars_count ?? 0 ?>,
            }],
            resize: !0,
            colors: ["#e3eaef", "#ff679b", "#777edd"],
            labelColor: "#888",
            backgroundColor: "transparent",
            fillOpacity: .1,
            formatter: function(e) {
                return e //e + "h"
            }
        }), $(function() {
            var a = $(".todo-list"),
                t = $(".todo-list-input");
            $(".add-new-todo-btn").on("click", function(e) {
                e.preventDefault();
                e = $(this).prevAll(".todo-list-input").val();
                e && (a.append(
                        "<div class='todo-box'><i class='remove far fa-trash-alt'></i><div class='todo-task'><label class='ckbox'><input type='checkbox'/><span>" +
                        e + "</span><i class='input-helper'></i></label></div></div>"), t
                    .val(
                        ""))
            }), a.on("change", ".ckbox", function() {
                $(this).attr("checked") ? $(this).removeAttr("checked") : $(this).attr(
                    "checked",
                    "checked"), $(this).closest(".todo-box").toggleClass("completed")
            }), a.on("click", ".remove", function() {
                $(this).parent().remove()
            })
        })
    });

    $(".peity-line").each(function() {
        $(this).peity("line", $(this).data())
    }), $(".peity-bar").each(function() {
        $(this).peity("bar", $(this).data())
    }), $("#datatable").DataTable(), $("#datatable_length select").addClass("form-select form-select-sm");


    // Call fetch(url) with default options.
    // It returns a Promise object (Resolve response object)
    var DataChart = [];
    async function fetchDumpChart() {
        await fetchHandler();
        let line = new Morris.Line({
            element: "morris-line-chart",
            resize: true,
            data: DataChart,
            xkey: "y",
            ykeys: ["Active", "Inactive"],
            labels: ["Active", "Inactive"],
            gridLineColor: "rgba(108, 120, 151, 0.2)",
            lineColors: ["#44a2d2", "#0acf97"],
            lineWidth: 2,
            hideHover: "auto"
        });
    }
    fetchDumpChart();
    async function fetchHandler() {
        const response = await fetch('https://yotrip.vn/api/v1/admin/statistical');
        const posts = await response.json();

        const data = posts.data;

        DataChart = data;
        //console.log(DataChart);
    }

    chart = new Chartist.Pie("#animating-donut", {
        series: [20, 20, 20],
        labels: [1, 2, 3]
    }, {
        donut: !0,
        showLabel: !1,
        donutWidth: 30,
        plugins: [Chartist.plugins.tooltip()]
    });
    chart.on("draw", function(e) {
        var i, t;
        "slice" === e.type && (i = e.element._node.getTotalLength(), e.element.attr({
                "stroke-dasharray": i + "px " + i + "px"
            }), t = {
                "stroke-dashoffset": {
                    id: "anim" + e.index,
                    dur: 1e3,
                    from: -i + "px",
                    to: "0px",
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    fill: "freeze"
                }
            }, 0 !== e.index && (t["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element
            .attr({
                "stroke-dashoffset": -i + "px"
            }), e.element.animate(t, !1))
    }), chart.on("created", function() {
        window.__anim21278907124 && (clearTimeout(window.__anim21278907124), window.__anim21278907124 = null),
            window.__anim21278907124 = setTimeout(chart.update.bind(chart), 1e4)
    }), $("#world-map-markers").vectorMap({
        map: "world_mill_en",
        scaleColors: ["#eff0f1", "#eff0f1"],
        normalizeFunction: "polynomial",
        hoverOpacity: .7,
        hoverColor: !1,
        regionStyle: {
            initial: {
                fill: "#eff0f1"
            }
        },
        markerStyle: {
            initial: {
                r: 4,
                fill: "#0acf97",
                "fill-opacity": .9,
                stroke: "#fff",
                "stroke-width": 5,
                "stroke-opacity": .4
            },
            hover: {
                stroke: "#fff",
                "fill-opacity": 1,
                "stroke-width": 2
            }
        },
        backgroundColor: "transparent",
        markers: [{
            latLng: [61.52, 105.31],
            name: "Russia"
        }, {
            latLng: [-25.27, 133.77],
            name: "Australia"
        }, {
            latLng: [20.59, 78.96],
            name: "India"
        }, {
            latLng: [39.52, -87.12],
            name: "Brazil"
        }],
        series: {
            regions: [{
                values: {
                    US: "#e0f9f2",
                    AU: "#e0f9f2",
                    IN: "#e0f9f2",
                    RU: "#fde3e7"
                },
                attribute: "fill"
            }]
        }
    });
</script>
<script>
    //Script tạo popup hiện lên khi bấm nút xóa
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.nutXoaDayNe').click(function(e) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                    title: "Confirm!",
                    text: "Car that has been deleted cannot be retrieved!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Oh good luck, not deleted yet!!!");
                    }
                });
        })
    })
</script>
</body>

</html>
