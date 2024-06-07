import { test, expect } from '@playwright/test';

// User information
const user = {
    name: "chanleang1",
    email: "chanleang1@gmail.com",
    password: "12345678"
};

test('Register new User', async ({ page }) => {
    await page.goto('http://127.0.0.1:8000/');

    await page.getByRole('link', { name: 'Register' }).click();

    await page.getByRole('textbox', { name: 'Name' }).fill(user.name);
    await page.getByRole('textbox', { name: 'E-Mail Address' }).fill(user.email);
    await page.getByRole('textbox', { name: 'Password', exact: true }).fill(user.password);
    await page.getByRole('textbox', { name: 'Confirm Password', exact: true }).fill(user.password);

    await page.getByRole('button', { name: 'Register' }).click();

    await expect(page.getByText('You are logged in!')).toBeVisible();
});

test('Log in User', async ({ page }) => {
    await page.goto('http://127.0.0.1:8000/');

    await page.getByRole('link', { name: 'Login' }).click();

    await page.getByRole('textbox', { name: 'E-Mail Address' }).fill(user.email);
    await page.getByRole('textbox', { name: 'Password' }).fill(user.password);

    await page.getByRole('button', { name: 'Login' }).click();

    await expect(page.getByText('You are logged in!')).toBeVisible();
});

test('Log out User', async ({ page }) => {
    await page.goto('http://127.0.0.1:8000/');

    await page.getByRole('link', { name: 'Login', exact: true }).click();

    await page.getByRole('textbox', { name: 'E-Mail Address', exact: true }).fill(user.email);
    await page.getByRole('textbox', { name: 'Password', exact: true }).fill(user.password);

    await page.getByRole('button', { name: 'Login' }).click();

    await expect(page.getByText('You are logged in!')).toBeVisible();

    await page.getByRole('button', { name: user.name }).click();
    await page.getByRole('link', { name: 'Logout' }).click();

    await expect(page.getByText("Your Application's Landing Page.")).toBeVisible();
});
