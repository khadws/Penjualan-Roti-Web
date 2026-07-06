/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package latihan;
import java.lang.annotation.Repeatable;
import java.util.Scanner;
/**
 *
 * @author PC
 */
public class Latihan {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner input = new Scanner (System.in);
        
        System.out.println("Masukkan daftar buah yang ingin di simpan ");
        System.out.print("Apel, Jeruk, dan Semangka :");
        
        String buah = input.nextLine();
        int harga = 0;
                
        if (null == buah){
            System.err.println("Buah tidak ada dalam daftar !");
        }else switch (buah) {
            case "apel":
                harga = 15000;
                break;
            case "jeruk":
                harga = 13000; 
                break;
            case "semangka":
                harga = 20000;
                break;
            default:
                System.err.println("Buah tidak ada dalam daftar !");
                break;
        }
    System.out.print("Masukkan Jumlah Persediaan buah :");
        double kg = input.nextDouble();

        System.out.println("Buah yang tersedia : " + buah);
        System.out.println("Harga buah per Kg : " + "Rp" + harga + "/kg");
        System.out.println("Persediaan buah/kg : " + kg + "kg");
    }
    
}
