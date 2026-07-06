package praktikum.P3;
import java.util.Scanner;

public class tugasNo2 {

    public static void main (String [] args) {
        Scanner input = new Scanner(System.in);

        System.out.println("Masukkan nama anda : ");
        String nama = input.nextLine();

        System.out.println("Masukkan nama buku yang dipinjam : ");
        String namaBuku = input.nextLine();

        System.out.println("");

        System.out.println("Masukkan hari peminjaman ");
        System.out.println("Hari : ");
        int hariPinjam = input.nextInt();
        
        System.out.println("Bulan : ");
        int bulanPinjam = input.nextInt();
        
        System.out.println("Tahun : ");
        int tahunPinjam = input.nextInt();

        System.out.println("Masukkan hari pengembalian ");
        System.out.println("Hari : ");
        int hariKembali = input.nextInt();

        System.out.println("Bulan : ");
        int bulanKembali = input.nextInt();

        System.out.println("Tahun : ");
        int tahunKembali = input.nextInt();
        
        System.out.println("##############################################################");
        System.out.println("Nama peminjam : "+ nama);
        System.out.println("Nama buku pinjaman : "+ namaBuku);
        System.out.println("Tanggal peminjaman : "+ hariPinjam +"/"+ bulanPinjam +"/"+ tahunPinjam);
        System.out.println("Tanggal pengembalian : "+ hariKembali +"/"+ bulanKembali +"/"+ tahunKembali);
        System.out.println("##############################################################");
    }
}