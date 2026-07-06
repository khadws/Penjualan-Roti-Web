/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package latihan;
import java.util.Scanner;
/**
 *
 * @author PC
 */
public class KlasifikasiNilai {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        
        System.out.println("Masukkan Nilai siswa :");
        int nilai = input.nextInt();
        if (nilai >= 0 && nilai <=100){
            if(nilai >= 90){
                System.out.println("A Sangat Baik ");
                System.out.println("Selamat anda Lulus dengan predikat terbaik");
            }else if(nilai >= 75){
                System.out.println("B Baik ");
            }else if(nilai >= 60) {
                System.out.println("C Cukup ");
            }else if(nilai >= 40) {
                System.out.println("D Kurang ");
            }else{
                System.out.println("E Gagal");
            }
        }else{
            System.out.println("Nilai tidak valid, harus antara 0 sampai 100");
        }
        
    }
    
}
