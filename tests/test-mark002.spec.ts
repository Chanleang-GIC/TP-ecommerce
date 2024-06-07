import { test, expect } from '@playwright/test';

test('testincompletetask', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000/tasks/');
  await expect(page.locator(".panel-heading")).toBeVisible;

  await page.getByLabel("E-mail Address").fill("chanleang7779@gmail.com");
  await page.getByLabel("Password").fill("12345678");
  await page.getByRole("button", {name: "Login"}).click();

  await page.waitForTimeout(1000);
  await expect(page.getByText('All Tasks').nth(1)).toBeVisible();
//   await expect(page.locator(".my-tab-content")).toBeVisible;
  await page.locator(".fa-pencil").nth(1).click();
  await page.locator("#status").click();
  await page.getByRole("button", {name: "Save"}).click();
  await expect(page.getByText('Task Updated')).toBeVisible();
});