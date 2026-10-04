package customermanager_thi;

public class Customer {
	private int customer_ID;
	private String customer_Name;
	private String customer_Gender;
	private int customer_Age;
	public Customer left;
	public Customer right;
	
	//getter _ setter
	public int getCustomer_ID() {
		return customer_ID;
	}
	public void setCustomer_ID(int customer_ID) {
		this.customer_ID = customer_ID;
	}
	public String getCustomer_Name() {
		return customer_Name;
	}
	public void setCustomer_Name(String customer_Name) {
		this.customer_Name = customer_Name;
	}
	public String getCustomer_Gender() {
		return customer_Gender;
	}
	public void setCustomer_Gender(String customer_Gender) {
		this.customer_Gender = customer_Gender;
	}
	public int getCustomer_Age() {
		return customer_Age;
	}
	public void setCustomer_Age(int customer_Age) {
		this.customer_Age = customer_Age;
	}
	
	//constructor
	public Customer(int customer_ID, String customer_Name, String customer_Gender, int customer_Age) {
		super();
		this.customer_ID = customer_ID;
		this.customer_Name = customer_Name;
		this.customer_Gender = customer_Gender;
		this.customer_Age = customer_Age;
		this.left = null;
		this.right = null;
	}
	
	//toString
	@Override
	public String toString() {
		return "Khách hàng [ID khách hàng=" + customer_ID + ", Tên khách hàng=" + customer_Name + ", Giới tính="
				+ customer_Gender + ", Tuổi=" + customer_Age + "]";
	}
	
	
}
