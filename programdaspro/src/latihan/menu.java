package latihan;

import java.util.Scanner;

public class menu {

    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);

        int makanan = 0;
        int minuman = 0;
        int hargaMakan = 0;
        int hargaMinum = 0;

        System.out.println("========== Selamat Datang ==========");
        System.out.println("Silahkan Pilih Menu dibawah ini");
        System.out.println("1. Makanan ");
        System.out.println("2. Minuman ");
        System.out.println("3. Makanan dan minuman ");

        int menu = input.nextInt();

        if (menu == 1 || menu == 3) {
            System.out.println("========== Pilih Makanan ==========");
            System.out.println("1. Indomie Goreng (Rp7.000)");
            System.out.println("2. Nasi Goreng (Rp15.000)");
            System.out.println("3. Bebek Bakar (Rp17.000)");
            System.out.println("4. Ayam Bakar (Rp17.000)");
            makanan = input.nextInt();

            if (makanan == 1) {
                hargaMakan = 7000;
            } else if (makanan == 2) {
                hargaMakan = 15000;
            } else if (makanan == 3 && makanan == 4) {
                hargaMakan = 17000;
            } else {
                System.err.println("Makanan tidak ada dalam daftar");
                makanan = 0;
            }
        }

        if (menu == 2 || menu == 3) {
            System.out.println("========== Pilih Minuman ==========");
            System.out.println("1. Teh es/panas (Rp5.000)");
            System.out.println("2. Jeruk es/panas (Rp6.000)");
            System.out.println("3. Kopi es/panas (Rp7.000)");
            System.out.println("4. Air Mineral (Rp4.000)");
            minuman = input.nextInt();

            if (minuman == 1) {
                hargaMinum = 5000;
            } else if (minuman == 2) {
                hargaMinum = 6000;
            } else if (minuman == 3) {
                hargaMinum = 7000;
            } else if (minuman == 4) {
                hargaMinum = 4000;
            } else {
                System.err.println("Minuman tidak ada dalam daftar");
                minuman = 0;
            }

            System.out.println("========== Daftar pesanan ==========");
            if(menu == 1 || menu == 3){
                System.out.println("Makanan\t : " + (makanan));
            }
            if(menu == 2 || menu == 3){
                System.out.println("Minuman\t : " + minuman);
            }
            System.out.println("------------------------------------");
            System.out.println("Total Harga : Rp"+ (hargaMakan + hargaMinum));
            System.out.println("====================================");
        }

    }
}
