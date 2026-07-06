package praktikum.P3;
import java.util.Scanner;

public class tugasNo1 {

    public static void main (String [] args) {
        Scanner input = new Scanner(System.in);

        System.out.println("Jam normal/minggu :");
        int jamNormal = input.nextInt();
        System.out.println("Jam karyawan kerja :");
        int jamKaryawan = input.nextInt();
        System.out.println("Lembur karyawan : "+ ((int) jamKaryawan - jamNormal)+"jam");

        System.out.println("");

        System.out.println("Tarif lembur adalah 50% dari upah per-jam");
        double tarifLembur = 0.5;
        System.out.println("Tarif upah : ");
        double upahNormal = input.nextDouble();
        System.out.println("Tarif lembur : "+ tarifLembur * upahNormal);

        System.out.println("Upah normal :" + jamNormal * upahNormal);
        System.out.println("Upah Lembur :" + ((jamKaryawan-jamNormal) * (upahNormal+(tarifLembur*upahNormal))));

        System.out.println("");
        
        System.out.println("Total upah yang diperoleh karyawan : "+ ((jamKaryawan-jamNormal) * (upahNormal+(tarifLembur*upahNormal)) + (jamNormal * upahNormal)));
        
    }
}