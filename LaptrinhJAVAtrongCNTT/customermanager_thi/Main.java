package customermanager_thi;

import java.util.ArrayList;
import java.util.LinkedList;

public class Main {
	public static Customer addCustomer(Customer root, Customer e) {
		if (root == null)
			return e;
		if (e.getCustomer_ID() < root.getCustomer_ID()) {
			root.left = addCustomer(root.left, e);
		} else if (e.getCustomer_ID() > root.getCustomer_ID()) {
			root.right = addCustomer(root.right, e);
		}
		return root;
	}

	public static void readtree(Customer root) {
		if (root != null) {
			readtree(root.left);
			System.out.println(root.toString());
			readtree(root.right);
		}
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Customer u1 = new Customer(107, "An", "Nam", 30);
		Customer u2 = new Customer(101, "Hoa", "Nữ", 20);
		Customer u3 = new Customer(105, "Khanh", "Nam", 35);
		Customer u4 = new Customer(103, "Mai", "Nữ", 39);
		Customer u5 = new Customer(109, "Huy", "Nam", 27);
		Customer u6 = new Customer(102, "Bình", "Nam", 25);
		Customer u7 = new Customer(104, "Thuận", "Nam", 29);
		Customer root = u1;
		root = addCustomer(root, u2);
		root = addCustomer(root, u3);
		root = addCustomer(root, u4);
		root = addCustomer(root, u5);
		root = addCustomer(root, u6);
		root = addCustomer(root, u7);
		System.out.println("Danh sách khách hàng(cấu trúc BST): ");
		readtree(root);

//		LinkedList<Customer> list = new LinkedList<>();
//		list.add(u1);list.add(u2);list.add(u3);list.add(u4);
//		list.add(u5);list.add(u6);list.add(u7);
//		System.out.println("Danh sách khách hàng");
//		for (Customer e:list) System.out.println(e.toString());
//		//tìm trung bình
//		double avg = 0, sum = 0;
//		for (Customer e:list) sum+=e.getCustomer_Age();
//		if (sum!=0) avg = sum/list.size();
//		int g=0,s=0;
//		for (Customer e:list) if (e.getCustomer_Age()>avg) g++; else s++;
//		System.out.println("Tuổi trung bình khách hàng là: " + avg);
//		System.out.println("Số khách hàng có tuổi lớn hơn trung bình là: " + g + " nhỏ hơn là: " + s);
//		System.out.println("Danh sách khách hàng nam là: ");
//		for (Customer e:list) if (e.getCustomer_Gender().compareTo("Nam")==0) System.out.println(e.toString());
//		System.out.println("Danh sách khách hàng nữ là: ");
//		for (Customer e:list) if (e.getCustomer_Gender().compareTo("Nữ")==0) System.out.println(e.toString());
//		
//		// Tính tuổi trung bình, tìm max/min tuổi khách nam
//		double sumNam = 0;
//		int countNam = 0;
//		Customer maxNam = null, minNam = null;
//		
//		for (Customer e:list) {
//			if (e.getCustomer_Gender().compareTo("Nam")==0) {
//				sumNam += e.getCustomer_Age();
//				countNam++;
//				
//				if (maxNam == null || e.getCustomer_Age()> maxNam.getCustomer_Age()) {
//					maxNam = e;
//				}
//				if (minNam == null || e.getCustomer_Age()< minNam.getCustomer_Age()) {
//					minNam = e;
//				}
//			}
//		}
//		if (countNam > 0) {
//			System.out.println("\nTuổi trung bình khách hàng nam: " + (sumNam / countNam));
//			System.out.println("Khách nam có tuổi lớn nhất: " + maxNam.toString());
//			System.out.println("Khách nam có tuổi nhỏ nhất: " + minNam.toString());
//		}
//		
//		// tính tuổi trung bình, tìm min/max khách nữ
//		double sumNu = 0;
//		int countNu = 0;
//		Customer maxNu = null, minNu = null;
//		
//		for (Customer e:list) {
//			if (e.getCustomer_Gender().compareTo("Nữ")==0) {
//				sumNu += e.getCustomer_Age();
//				countNu++;
//				
//				if (maxNu == null || e.getCustomer_Age()> maxNu.getCustomer_Age()) {
//					maxNu = e;
//				}
//				if (minNu == null || e.getCustomer_Age()< minNu.getCustomer_Age()) {
//					minNu = e;
//				}
//			}
//		}
//		if (countNam > 0) {
//			System.out.println("\nTuổi trung bình khách hàng nữ: " + (sumNu / countNu));
//			System.out.println("Khách nữ có tuổi lớn nhất: " + maxNu.toString());
//			System.out.println("Khách nữ có tuổi nhỏ nhất: " + minNu.toString());
//		}
//		
//		//sắp xếp khách hàng
//		System.out.println("Danh sách khách hàng sắp xếp theo ID: ");
//		list.sort(new IDComparator());
//		for (Customer e:list) System.out.println(e.toString());
//		
//		System.out.println("Danh sách khách hàng sắp xếp theo tên: ");
//		list.sort(new NameComparator());
//		for (Customer e:list) System.out.println(e.toString());
	}
}
