using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using MVCworkorderDB.Models;

namespace MVCworkorderDB.Controllers
{
    public class CompanysController : Controller
    {
        private Model2 db = new Model2();

        // GET: Companys
        public ActionResult Index()
        {
            var companys = db.companys.Include(m => m.managers).Include(m => m.locations);
            return View(companys.ToList());
        }

        // GET: Companys/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            companys companys = db.companys.Find(id);
            if (companys == null)
            {
                return HttpNotFound();
            }
            return View(companys);
        }

        // GET: Companys/Create
        public ActionResult Create()
        {
            ViewBag.manager_roll_num = new SelectList(db.managers, "roll_num", "first_name");
            ViewBag.location_id = new SelectList(db.locations, "id", "name");
            return View();
        }

        // POST: Companys/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "id,manager_roll_num,location_id,companys1")] companys companys)
        {
            if (ModelState.IsValid)
            {
                db.companys.Add(companys);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.manager_roll_num = new SelectList(db.managers, "roll_num", "first_name", companys.manager_roll_num);
            ViewBag.location_id = new SelectList(db.locations, "id", "name", companys.location_id);
            return View(companys);
        }

        // GET: Companys/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            companys companys = db.companys.Find(id);
            if (companys == null)
            {
                return HttpNotFound();
            }
            ViewBag.manager_roll_num = new SelectList(db.managers, "roll_num", "first_name", companys.manager_roll_num);
            ViewBag.location_id = new SelectList(db.locations, "id", "name", companys.location_id);
            return View(companys);
        }

        // POST: Companys/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "id,manager_roll_num,location_id,companys1")] companys companys)
        {
            if (ModelState.IsValid)
            {
                db.Entry(companys).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.manager_roll_num = new SelectList(db.managers, "roll_num", "first_name", companys.manager_roll_num);
            ViewBag.location_id = new SelectList(db.locations, "id", "name", companys.location_id);
            return View(companys);
        }

        // GET: Companys/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            companys companys = db.companys.Find(id);
            if (companys == null)
            {
                return HttpNotFound();
            }
            return View(companys);
        }

        // POST: Companys/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            companys companys = db.companys.Find(id);
            db.companys.Remove(companys);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
