<?php
$tong_don_hang = $db->oneRaw("SELECT COUNT(*) FROM don_hang");
$tong_thanh_vien = $db->oneRaw("SELECT COUNT(*) FROM khach_hang ");
$tong_doanh_thu = $db->oneRaw("SELECT SUM(tong_tien) FROM don_hang");

$thong_ke = $db->getRaw("-- Tạo bảng tạm chứa các tháng từ 5 đến 10
SELECT 
    m.thang,
    IFNULL(SUM(d.tong_tien), 0) AS doanh_thu
FROM (
    SELECT 5 AS thang UNION
    SELECT 6 UNION
    SELECT 7 UNION
    SELECT 8 UNION
    SELECT 9 UNION
    SELECT 10
) AS m
LEFT JOIN don_hang d
    ON MONTH(d.ngay_tao) = m.thang AND YEAR(d.ngay_tao) = 2025
GROUP BY m.thang
ORDER BY m.thang;
");

$san_pham_ban_chay = $db->getRaw("SELECT 
    sp.id AS san_pham_id,
    sp.ten_san_pham,
    th.ten_thuong_hieu,
    SUM(ctdh.so_luong) AS tong_so_luong_ban
FROM 
    chi_tiet_don_hang ctdh
JOIN 
    san_pham sp ON ctdh.san_pham_id = sp.id
JOIN 
    thuong_hieu th ON sp.thuong_hieu_id = th.id
GROUP BY 
    sp.id, sp.ten_san_pham, th.ten_thuong_hieu
ORDER BY 
    tong_so_luong_ban DESC
LIMIT 5;
");
$thuong_hieu_ban_chay = $db->getRaw("SELECT 
    th.id AS thuong_hieu_id,
    th.ten_thuong_hieu,
    SUM(ctdh.so_luong) AS tong_so_luong_ban
FROM 
    chi_tiet_don_hang ctdh
JOIN 
    san_pham sp ON ctdh.san_pham_id = sp.id
JOIN 
    thuong_hieu th ON sp.thuong_hieu_id = th.id
GROUP BY 
    th.id, th.ten_thuong_hieu
ORDER BY 
    tong_so_luong_ban DESC
LIMIT 5;
");

?>

<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Bảng điều khiển</h3>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">

        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row"> <!--begin::Col-->
                <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 1-->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3><?= $tong_don_hang['COUNT(*)'] ?></h3>
                            <p>Đơn hàng</p>
                        </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z">
                            </path>
                        </svg>
                    </div> <!--end::Small Box Widget 1-->
                </div> <!--end::Col-->
                <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 2-->
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3><?= $func->format_tiente($tong_doanh_thu['SUM(tong_tien)']) ?> đ</h3>
                            <p>Doanh thu</p>
                        </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                            </path>
                        </svg>
                    </div> <!--end::Small Box Widget 2-->
                </div> <!--end::Col-->
                <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 3-->
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3><?= $tong_thanh_vien['COUNT(*)'] ?></h3>
                            <p>Khách hàng thành viên</p>
                        </div> <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                            </path>
                        </svg>
                    </div> <!--end::Small Box Widget 3-->
                </div> <!--end::Col-->
            </div>

            <!--begin::Row-->
           <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Thống kê sản phẩm bán chạy</div>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="6%" class="text-center">STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên thương hiệu</th>
                                <th width="10%" class="text-center">Số lượng bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dem=1;
                            foreach ($san_pham_ban_chay as $item):
                                ?>
                                <tr>
                                    <td class="text-center"><?= $dem++ ?></td>
                                    
                                    <td><?= $item['ten_san_pham'] ?></td>
                                    <td><?= $item['ten_thuong_hieu'] ?></td>
                                   
                                    <td class="text-center"><?= $item['tong_so_luong_ban'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Thống kê thương hiệu bán chạy</div>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="6%" class="text-center">STT</th>
                                <th>Tên thương hiệu</th>
                                <th width="10%" class="text-center">Số lượng bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dem=1;
                            foreach ($san_pham_ban_chay as $item):
                                ?>
                                <tr>
                                    <td class="text-center"><?= $dem++ ?></td>
                                    
                                    
                                    <td><?= $item['ten_thuong_hieu'] ?></td>
                                    <td class="text-center"><?= $item['tong_so_luong_ban'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card card-primary card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Thống kê doanh thu theo tháng</div>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    
                    <canvas id="doanhThuChart"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <p class="text-center mt-4 fst-italic">Biểu đồ doanh thu từ tháng 5 đến tháng 10 năm 2025</p>
                </div>
            </div>

    
            <!--end::Row-->

            <script>
                // Gọi dữ liệu PHP
                const dataFromPHP = <?php echo json_encode($thong_ke); ?>;

                // Tách nhãn (tháng) và doanh thu
                const labels = dataFromPHP.map(item => 'Tháng ' + item.thang);
                const data = dataFromPHP.map(item => item.doanh_thu);

                // Cấu hình biểu đồ
                const ctx = document.getElementById('doanhThuChart').getContext('2d');
                const doanhThuChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Doanh thu (VNĐ)',
                            data: data,
                            backgroundColor: '#4CAF50',
                            borderColor: '#388E3C',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return value.toLocaleString('vi-VN') + ' ₫';
                                    }
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' +
                                            context.parsed.y.toLocaleString('vi-VN') + ' ₫';
                                    }
                                }
                            }
                        }
                    }
                });
            </script>
            <!--end::Row-->
        </div>
        <!--end::Container-->

    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->