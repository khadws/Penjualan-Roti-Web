package praktikum.P4;
import java.util.Scanner;

public class tugasNo2 {
    public static void main (String[]args) {
        Scanner input = new Scanner(System.in);

        System.out.println("Masukkan nama barang : ");
        String namaBarang = input.nextLine();
        System.out.println("Masukkan harga per unit : ");
        int hargaPerU = input.nextInt();
        System.out.println("Masukkan jumlah barang : ");
        int jumlahBarang = input.nextInt();
        System.out.println("Masukkan berat total barang (Kg) : ");
        int berat = input.nextInt();
        System.out.println("Masukkan jarak pengiriman (Km) : ");
        int jarak = input.nextInt();
        System.out.println("");

        double diskon = 0;
        if (hargaPerU > 5000000){
            if(hargaPerU > 10000000){
                diskon = 0.20;
            }if(hargaPerU >= 7000000 && hargaPerU <= 10000000){
                diskon = 0.15;
            }if(hargaPerU >= 5000000 && hargaPerU <= 7000000){
                diskon = 0.10;
            }
        }else{
            diskon = 0;
        }

        double pajak = (hargaPerU*jumlahBarang) - diskon;
        if(hargaPerU > 8000000){
            pajak = pajak*0.10;
        }else if (hargaPerU <= 8000000){
            pajak = pajak*0.05;
        }

        int ongkir = berat * jarak;
        if(berat > 10){
            if(jarak > 100){
                ongkir = 100000;
            }if(jarak <= 100){
                ongkir = 75000;
            }
        }else if(berat <= 10){
            if(jarak > 100){
                ongkir = 50000;
            }if(jarak <= 100){
                ongkir = 30000;
            }
        }

        double totalSetelahDiskon = (hargaPerU*jumlahBarang) - diskon;
        
        System.out.println("==================== NOTA ====================");
        System.out.println("Nama barang\t\t : " + namaBarang);
        System.out.println("Harga Satuan\t\t : " + "Rp " + hargaPerU);
        System.out.println("Jumlah\t\t\t : " + jumlahBarang);
        System.out.println("Berat Total\t\t : " + berat +"Kg");
        System.out.println("Jarah Pengiriman\t : " + jarak +"Km");
        System.out.println("Total Harga\t\t : " + "Rp " + ((double) hargaPerU*jumlahBarang));
        System.out.println("Diskon\t\t\t : " + "Rp " + diskon);
        System.out.println("Total Setelah Diskon\t : " +  "Rp " + totalSetelahDiskon );
        System.out.println("Pajak\t\t\t : " +  "Rp " + pajak);
        System.out.println("Ongkons Kirim \t\t : " +"Rp " + ongkir);
        System.out.println("----------------------------------------------");
        System.out.println("Total Bayar\t\t : " + "Rp " + (totalSetelahDiskon + pajak + ongkir));
        System.out.println("==============================================");
        System.out.println("                  TERIMAKASIH                 ");
        System.out.println("==============================================");
    }
    
}