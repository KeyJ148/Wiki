rmdir /s/q "D:\Workspace\VirtualBox\Ubuntu server 16.04 x64\SharedFolder\Wiki\"
mkdir "D:\Workspace\VirtualBox\Ubuntu server 16.04 x64\SharedFolder\Wiki"
xcopy "D:\Workspace\PhpStorm\Wiki\app\*" "D:\Workspace\VirtualBox\Ubuntu server 16.04 x64\SharedFolder\Wiki\app\" /s/e
xcopy "D:\Workspace\PhpStorm\Wiki\public\*" "D:\Workspace\VirtualBox\Ubuntu server 16.04 x64\SharedFolder\Wiki\public\" /s/e
copy "D:\Workspace\PhpStorm\Wiki\.htaccess" "D:\Workspace\VirtualBox\Ubuntu server 16.04 x64\SharedFolder\Wiki\.htaccess"
copy "D:\Workspace\PhpStorm\Wiki\index.php" "D:\Workspace\VirtualBox\Ubuntu server 16.04 x64\SharedFolder\Wiki\index.php"
