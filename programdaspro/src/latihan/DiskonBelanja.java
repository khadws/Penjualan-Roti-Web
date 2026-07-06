/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package latihan;
import java.util.Scanner;
/**
 *
 * @author PC
 */
public class DiskonBelanja {
    public static void main (String[]args){
        Scanner input = new Scanner(System.in);
        
        System.out.println("Masukkan nama barang belanja :");
        String barang = input.nextLine();
        
        System.out.println("Masukkan jumlah barang yang dibeli :");
        int jumlahBarang = input.nextInt();
        System.out.println("Masukkan harga satuan barang : :;");
        int hargaSatuan = input.nextInt();
        int totalHarga = hargaSatuan * jumlahBarang;
        
        System.out.println("Apakah anda member ? True/False");
        boolean member = input.nextBoolean();
        
        double diskon = 0;
        if(member == true){
            if(totalHarga >= 1000000){
                diskon = 0.15;
            }else if(totalHarga >= 500000){
                diskon = 0.10;
            }else if(totalHarga <= 500000){
                diskon = 0.05;
            }
        }if(member == false){
            if(totalHarga >= 1000000){
                diskon = 0.05;
            }else{
                System.out.println("");
            }
        }

        double totalBayar = totalHarga - (totalHarga*diskon);

        System.out.println("========== Struk Pembayaran ==========");
        System.out.println("Kategori Member\t : " + member);
        System.out.println("Nama Barang\t : " + barang);
        System.out.println("Jumlah Barang\t : " + jumlahBarang);
        System.out.println("Harga Satuan\t : " + "Rp " + hargaSatuan);
        System.out.println("Diskon\t\t : " + "Rp " + ((int)(totalHarga * diskon)));
        System.out.println("Total Harga\t : " + "Rp " + ((int)totalBayar));
    }
}
