$customersArr = [];

<!-- Thêm phần tử (Nếu ta không khai báo key vào trong [] thì mặc định lấy key là index từ 0 tăng lên) -->
$customersArr[] = 'PHP';                            Key sẽ là 0
$customersArr[] = 'NODEJS';                         Key sẽ là 1
$customersArr['name'] = 'Nguyễn Trung Kiên';
$customersArr['age'] = 22;
$customersArr['gender'] = 1;

<!-- Xóa phần tử -->
unset($customersArr['gender']);                     Xóa phần tử có key là gender
