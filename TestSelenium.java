/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication7;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.firefox.FirefoxDriver;


/**
 *
 * @author Victor
 */
public class JavaApplication7 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws InterruptedException {
        WebDriver d1 = new FirefoxDriver();
        d1.get("http://localhost:1000/Rosant-Software/Rosant/web/app_dev.php/admin/login");
        WebElement input;
        input = d1.findElement(By.id("username"));
        input.sendKeys("jumarome");

        input = d1.findElement(By.id("password"));
        input.sendKeys("juancho18");
        
        input.submit();  
        
        d1.get("http://localhost:1000/Rosant-Software/Rosant/web/app_dev.php/clientes");
        
        Thread.sleep(5000L);
        
        d1.get("http://localhost:1000/Rosant-Software/Rosant/web/app_dev.php/clientes/new");
        
        input = d1.findElement(By.id("mdw_rosantbundle_clientestype_nombre"));
        input.sendKeys("Selenium");
        input = d1.findElement(By.id("mdw_rosantbundle_clientestype_apellido"));
        input.sendKeys("Selenium");       
        input = d1.findElement(By.id("mdw_rosantbundle_clientestype_email"));
        input.sendKeys("petersonic1@hotmail.com");
        input = d1.findElement(By.id("mdw_rosantbundle_clientestype_fechaNacimiento_day"));
        input.sendKeys("01");     
        input = d1.findElement(By.id("mdw_rosantbundle_clientestype_fechaNacimiento_month"));
        input.sendKeys("01");     
        input = d1.findElement(By.id("mdw_rosantbundle_clientestype_fechaNacimiento_year"));
        input.sendKeys("1999");
        input = d1.findElement(By.id("mdw_rosantbundle_clientestype_cedula"));
        input.sendKeys("0905463543");
        input.submit();  
        Thread.sleep(5000L);
        
        System.out.println(d1.getTitle());
        
        d1.quit();
        
    }
    
    
}
