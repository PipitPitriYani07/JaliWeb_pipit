<?php

use App\Http\Controllers\AccountBankController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\JarakController;
use App\Http\Controllers\JenisTarifController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LainnyaController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PotonganHargaController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\KategoriRestoranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanUlasanController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\TransactionReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/user-create', [AuthController::class, 'store']);

Route::get('/forgot-password', [AuthController::class, 'lupaPassword']);
Route::post('/forgot-password', [AuthController::class, 'sendMail']);

// Route::get('/dashboard', function () {
//     return view('dashboard.index', ['title' => 'Dashboard']);
// })->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::get('pengguna/kirim_pesan/{id}', [PenggunaController::class, 'viewKirimPesan']);
    Route::post('pengguna/kirim_pesan', [PenggunaController::class, 'kirimPesan']);
    Route::get('/detail-pengguna/{id}', [PenggunaController::class, 'detail_pengguna']);
    Route::post('/pengguna/listdata', [PenggunaController::class, 'listData'])->name('pengguna.listData');
    Route::get('/pengguna/form/{id}', [PenggunaController::class, 'form']);
    Route::post('/pengguna', [PenggunaController::class, 'store']);
    Route::get('/pengguna/form', [PenggunaController::class, 'form']);
    Route::post('/pengguna/delete', [PenggunaController::class, 'destroy']);
    Route::get('/pengguna/{id}', [PenggunaController::class, 'detail_pengguna']);
    Route::post('/pengguna/listdatapengelola', [PenggunaController::class, 'listDataPengelola'])->name('pengguna.listDataPengelola');
    Route::post('/pengguna/addPengelola', [PenggunaController::class, 'addPengelola']);
    Route::post('/pengguna/savesaldo', [PenggunaController::class, 'saveSaldo']);
    Route::post('/pengguna/kurangsaldo', [PenggunaController::class, 'kurangSaldo']);
    Route::post('/pengguna/uploadfoto', [PenggunaController::class, 'uploadFoto']);
    Route::get('/pengguna/delete/{id}', [PenggunaController::class, 'destroy']);
    Route::get('/pengguna/form-info-mitra/{id}', [PenggunaController::class, 'formInfoMitra']);
    Route::post('/pengguna/saveInfoMitra', [PenggunaController::class, 'saveInfoMitra']);

    Route::get('laporan-ulasan', [LaporanUlasanController::class, 'index']);
    Route::post('laporan-ulasan/listData', [LaporanUlasanController::class, 'listData'])->name('ulasan.listData');
    Route::get('laporan-ulasan/detail/{id}', [LaporanUlasanController::class, 'detail']);

    Route::get('/layanan', [LayananController::class, 'index_kotalayanan']);
    Route::get('/pengaturan_wilayah', [LayananController::class, 'index']);
    Route::get('/formprovinsi', [LayananController::class, 'formprovinsi']);
    Route::get('/formprovinsi/{id}', [LayananController::class, 'formprovinsi']);
    Route::post('/saveprovinsi', [LayananController::class, 'saveProvinsi']);
    Route::post('/pengaturan_wilayah/listdataprovinsi', [LayananController::class, 'listData'])->name('pengaturan_wilayah.listDataProvinsi');
    Route::post('/pengaturan_wilayah/ambil-provinsi', [LayananController::class, 'ambilProvinsi'])->name('pengaturan_wilayah.ambil-provinsi');
    Route::post('/pengaturan_wilayah/listdatakota', [LayananController::class, 'listDataKota'])->name('pengaturan_wilayah.listDataKota');
    Route::post('/provinsi/delete', [LayananController::class, 'deleteProvinsi']);
    Route::get('/formkota/{id}', [LayananController::class, 'formkota']);
    Route::post('/savekota', [LayananController::class, 'saveKota']);
    Route::post('/kota/delete', [LayananController::class, 'deleteKota']);
    Route::get('/formtarif/{id}', [TarifController::class, 'formtarif']);
    Route::post('/savetarif', [TarifController::class, 'saveTarif']);
    Route::get('/formkota/{id}/{id_kota}', [LayananController::class, 'formkota']);

    Route::get('/pemesanan', [KeranjangController::class, 'index']);
    Route::post('/pemesanan/listdata', [KeranjangController::class, 'listData'])->name('pemesanan.listData');
    Route::get('/pemesanan/detail/{id}', [KeranjangController::class, 'detail']);
    Route::get('pemesanan/delete/{id}', [KeranjangController::class, 'destroy']);
    Route::post('pemesanan/check-password', [KeranjangController::class, 'checkPassword']);
    Route::post('pemesanan/ubah-status', [KeranjangController::class, 'ubahStatus']);
    Route::get('pemesanan/cetak-nota/{id}', [KeranjangController::class, 'cetakNota']);

    Route::get('/lainnya', [LainnyaController::class, 'index']);
    Route::post('/layanan/listdatakotalayanan', [LayananController::class, 'listDataKotaLayanan'])->name('layanan.listDataKotaLayanan');
    Route::post('/savekotalayanan', [LayananController::class, 'saveKotaLayanan']);
    Route::post('/kotalayanan/delete', [LayananController::class, 'deleteKotaLayanan']);
    Route::post('/kotalayanan/reqData/{id}', [LayananController::class, 'reqData']);
    Route::group(['prefix' => 'lainnya'], function () {
        Route::get('bagi-hasil', [LainnyaController::class, 'indexBagiHasil']);
        Route::post('saveBagiHasil', [LainnyaController::class, 'saveBagiHasil']);
    });

    Route::get('/tarif', [TarifController::class, 'index']);
    Route::post('/tarif/listDataLayanan', [TarifController::class, 'listDataLayanan'])->name('tarif.listDataLayanan');
    Route::get('/tarif/{id}/kelola', [TarifController::class, 'kelola']);
    Route::post('/tarif/listdata', [TarifController::class, 'listData'])->name('tarif.listData');
    Route::post('/tarif/aturmasal', [TarifController::class, 'aturMassal']);
    Route::post('/tarif/kelolaTarifKota', [TarifController::class, 'kelolaTarifKota']);
    Route::get('/tarif/{id}/kelola/formtarif/{idTarif}', [TarifController::class, 'formtarif']);
    Route::post('/tarif/delete', [TarifController::class, 'delete']);

    Route::get('/topup', [TopUpController::class, 'index']);
    Route::post('/topup/listdata', [TopUpController::class, 'listData'])->name('topup.listData');
    Route::get('/topup/detail/{id}', [TopUpController::class, 'detail']);
    Route::post('/topup/listDataRiwayat', [TopUpController::class, 'listDataRiwayat'])->name('topup.listDataRiwayat');
    Route::get('/topup/konfirmasi/{segment}/{id}', [TopUpController::class, 'konfirmasi']);
    Route::get('/topup/riwayat/{id}', [TopUpController::class, 'riwayat']);
    Route::post('/topup/listdatariwayat', [TopUpController::class, 'listDataRiwayat'])->name('topup.listDataRiwayat');


    Route::get('jenis_tarif', [JenisTarifController::class, 'index']);
    Route::get('jenis_tarif/form', [JenisTarifController::class, 'form']);
    Route::get('jenis_tarif/form/{id}', [JenisTarifController::class, 'form']);
    Route::post('jenis_tarif/save', [JenisTarifController::class, 'store']);
    Route::post('jenis_tarif/delete/{id}', [JenisTarifController::class, 'destroy']);


    Route::get('jarak', [JarakController::class, 'index']);
    Route::get('jarak/{id}', [JarakController::class, 'edit']);
    Route::post('jarak', [JarakController::class, 'update']);

    Route::get('banner', [BannerController::class, 'index']);
    Route::post('/banner/listdata', [BannerController::class, 'listData'])->name('banner.listData');
    Route::get('/banner/form/{id}', [BannerController::class, 'form']);
    Route::post('/banner', [BannerController::class, 'store']);
    Route::get('/banner/form', [BannerController::class, 'form']);
    Route::post('/banner/delete', [BannerController::class, 'destroy']);

    Route::get('potongan-harga', [PotonganHargaController::class, 'index']);
    Route::post('/potongan-harga/listdata', [PotonganHargaController::class, 'listData'])->name('potongan-harga.listData');
    Route::get('/potongan-harga/form/{id}', [PotonganHargaController::class, 'form']);
    Route::post('/potongan-harga', [PotonganHargaController::class, 'store']);
    Route::get('/potongan-harga/form', [PotonganHargaController::class, 'form']);
    Route::get('/potongan-harga/delete/{id}', [PotonganHargaController::class, 'destroy']);
    Route::post('/potongan-harga/non-aktif', [PotonganHargaController::class, 'nonaktif']);
    Route::get('/potongan-harga/detail/{id}', [PotonganHargaController::class, 'detail']);

    Route::get('restoran', [RestoranController::class, 'index']);
    Route::post('/restoran/listdata', [RestoranController::class, 'listData'])->name('restoran.listData');
    Route::get('/restoran/form/{id}', [RestoranController::class, 'form']);
    Route::post('/restoran', [RestoranController::class, 'store']);
    Route::get('/restoran/form', [RestoranController::class, 'form']);
    Route::post('/restoran/delete', [RestoranController::class, 'destroy']);
    Route::get('/restoran/detail/{id}', [RestoranController::class, 'detail']);
    Route::post('/menu/listDataMenu', [RestoranController::class, 'listDataMenu'])->name('restoran.listDataMenu');
    Route::post('/restoran/saveMenu', [RestoranController::class, 'saveMenu']);
    Route::post('/restoran/reqDataMenu/{id}', [RestoranController::class, 'reqDataMenu']);
    Route::post('/restoran/deleteMenu', [RestoranController::class, 'deleteMenu']);
    Route::get('/restoran/detail/{id}/kategori-menu', [RestoranController::class, 'kategoriMenu']);
    Route::post('/restoran/listDataKategoriMenu', [RestoranController::class, 'listDataKategoriMenu'])->name('restoran.listDataKategoriMenu');
    Route::post('/restoran/saveKategoriMenu', [RestoranController::class, 'saveKategoriMenu']);
    Route::post('/restoran/reqDataKategoriMenu/{id}', [RestoranController::class, 'reqDataKategoriMenu']);
    Route::post('/restoran/deleteKategoriMenu', [RestoranController::class, 'deleteKategoriMenu']);
    Route::post('/restoran/detail/tambah_jam_operasional', [RestoranController::class, 'tambah_jam_operasional']);
    Route::get('/jamOperasional/{id}/ubah', [RestoranController::class, 'edit_jam_operasional']);
    Route::put('/jamOperasional/save', [RestoranController::class, 'update_jam_operasional']);
    Route::post('/restoran/ubah-stok-menu', [RestoranController::class, 'ubahStokMenu']);
    Route::post('/restoran/check-password', [RestoranController::class, 'checkPassword']);
    Route::get('/restoran/delete/{id}', [RestoranController::class, 'destroy']);

    Route::get('kategori-restoran', [KategoriRestoranController::class, 'index']);
    Route::post('/kategori-restoran/listdata', [KategoriRestoranController::class, 'listData'])->name('kategori-restoran.listData');
    Route::get('/kategori-restoran/form/{id}', [KategoriRestoranController::class, 'form']);
    Route::post('/kategori-restoran', [KategoriRestoranController::class, 'store']);
    Route::get('/kategori-restoran/form', [KategoriRestoranController::class, 'form']);
    Route::post('/kategori-restoran/delete', [KategoriRestoranController::class, 'destroy']);

    Route::get('kendaraan', [KendaraanController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/dashboard/listdata', [DashboardController::class, 'listData'])->name('dashboard.listData');

    Route::post('/kendaraan/listData', [KendaraanController::class, 'listData'])->name('kendaraan.listData');
    Route::post('/kendaraan/reqData/{id}', [KendaraanController::class, 'reqData']);
    Route::post('/kendaraan/saveJenisKendaraan', [KendaraanController::class, 'saveJenisKendaraan']);

    // Routes Penarikan
    Route::get('penarikan', [PenarikanController::class, 'index']);
    Route::group(['prefix' => 'penarikan'], function () {
        Route::post('listData', [PenarikanController::class, 'listData'])->name('penarikan.listData');
        Route::get('detail/{id}', [PenarikanController::class, 'detail']);
        Route::post('check-password', [PenarikanController::class, 'checkPassword']);
        Route::post('ubah-status', [PenarikanController::class, 'ubahStatus']);
        Route::post('verifikasi', [PenarikanController::class, 'verifikasi']);
        Route::post('tolak', [PenarikanController::class, 'tolak']);
    });

    // Routes Laporan Transaksi
    Route::group(['prefix' => 'laporan-transaksi'], function () {
        Route::get('', [TransactionReportController::class, 'index']);
        Route::get('lihat-laporan/{tgl_mulai}/{tgl_selesai}', [TransactionReportController::class, 'lihatLaporan']);
        Route::get('lihat-laporan-bulanan/{bulan}/{tahun}', [TransactionReportController::class, 'lihatLaporanBulanan']);
    });

    Route::group(['prefix' => 'banks'], function () {
        Route::get("", [BankController::class, 'index']);
        Route::get("form", [BankController::class, 'form']);
        Route::get("form/{id}", [BankController::class, 'form']);
        Route::post("", [BankController::class, 'store']);
        Route::post("remove/{id}", [BankController::class, 'destroy']);
        Route::group(['prefix' => 'account'], function () {
            Route::get("", [AccountBankController::class, 'index']);
            Route::get("form", [AccountBankController::class, 'form']);
            Route::get("form/{id}", [AccountBankController::class, 'form']);
            Route::post("", [AccountBankController::class, 'store']);
            Route::post("remove/{id}", [AccountBankController::class, 'destroy']);
        });
    });
});
