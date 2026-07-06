package praktikum.P4;
import java.util.Scanner;

public class tugasNo1 {
    public static void main (String[]args) {
        Scanner input = new Scanner(System.in);

        String kartu  = "";
        System.out.println("Masukkan Nomor HP : ");
        String noHp = input.nextLine();
        String prefix = noHp.substring(0, 4);

        if (prefix.equals("0857")) kartu = "Indosat";
        else if (prefix.equals("0822")) kartu = "Telkomsel";
        else if (prefix.equals("0811")) kartu = "Halo";
        else if (prefix.equals("0821")) kartu = "Simpati";
        else if (prefix.equals("0851")) kartu = "By.U";
        else kartu = "tidak ditemukan";

        System.out.println("Kartu " + kartu + " ditemukan\n");

        System.out.println("Pilih Layanan : ");
        System.out.println("(1) 5.000");
        System.out.println("(2) 10.000");
        System.out.println("(3) 20.000");
        System.out.println("(4) 25.000");
        System.out.println("(5) 50.000");
        System.out.println("(6) 65.000");
        System.out.println("(7) Masa Aktif + 1 Minggu IDR 3000");
        System.out.println("(8) Masa Aktif + 1 Bulan IDR 10.000");

        System.out.print("input :");
        int pilihan = input.nextInt();

        int biaya = 0;
        switch (pilihan) {
            case 1: biaya = 5000;break;
            case 2: biaya = 10000;break;
            case 3: biaya = 20000;break;
            case 4: biaya = 25000;break;
            case 5: biaya = 50000;break;
            case 6: biaya = 65000;break;
            case 7: biaya = 3000;break;
            case 8: biaya = 10000;break;
            default:
                System.out.println("Pilihan tidak ada dalam daftar");
                return;
        }
        int admin = 0;
        if (biaya < 50000){
            admin = 2500;
        }else if (biaya <= 60000 && biaya >= 50000){
            admin = 2000;
        }else{
            admin = 1500;
        }

        double diskon = 0;
        if (biaya < 10000){
            diskon = 0.10;
        }else if (biaya < 50000){
            diskon = 0.20;
        }else{
            diskon = 0.30;
        }

        double potongan = biaya * diskon;
        int pendapatan = (int) potongan + admin;
        
        double totalBayar = biaya + admin;
        int koin = (biaya + admin)/200;

        System.out.println("Kategori\t : Pulsa " + kartu + " " + biaya);
        System.out.println("No. HP\t\t : " + noHp);
        System.out.println("Biaya\t\t : " + (int) (biaya - (potongan)));
        System.out.println("Admin\t\t : " + admin);
        System.out.println("Pendapatan\t : " + (int)pendapatan);
        System.out.println("Koin\t\t : " + koin);
        System.out.println("Total Bayar\t : " + (int)totalBayar);
    }
    
}
